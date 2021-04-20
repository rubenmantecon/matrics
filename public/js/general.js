/* FUNCTIONS */
/**
 * @description "check if value is null"
 * @param {String} element
 * @return {Boolean}
 */
function isNull(element) {
    return element.replace(/ /g, "") ? false : true;
}

/**
 * @description "wrapper for native fetch()"
 */
async function ajaxCall(url, verb, data) {
    let response = await fetch(url, {
        method: verb,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Accept: "application/json",
            "Content-Type": "application/json",
            token: $("meta[name='_token']").attr("content"),
        },
        body: JSON.stringify(data),
    });
    response = await response.json();
    return response;
}

/**
 * @description "Use values of designated text inputs to refresh table according to filter"
 */
function filterStudentsPage() {
    data = {};
    formChildren = $("section.filter > *");
    for (const elem of formChildren) {
        if (elem.value != "") {
            data[elem.name] = elem.value;
            console.log(data[elem.name]);
        }
    }
    $.ajax({
        url: "/api/students?filter=" + encodeURI(JSON.stringify(data)),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            $("tbody").css("display", "none").html("");
            if (res.data.length > 0) {
                for (const item of res.data) {
                    let state = "";
                    if (item.state === "pending") {
                        state = `<div class="circle-box" title="Pendent"><div class="circle orange"></div></div>`;
                    } else if (item.state === "unregistered") {
                        state = `<div class="circle-box" title="Sense Registrar"><div class="circle gray"></div></div>`;
                    }
                    $("tbody").append(
                        insertNewRow(
                            item.firstname,
                            item.lastname1 + " " + item.lastname2,
                            item.email,
                            item.name,
                            state,
                            `?student=${item.id}&term=${item.term_id}`,
                            "students"
                        )
                    );
                }
                for (const item of res.links) {
                    if (item.label === "&laquo; Previous")
                        item.label = '<i class="fas fa-angle-left"></i>';
                    else if (item.label === "Next &raquo;")
                        item.label = '<i class="fas fa-angle-right"></i>';

                    if (item.active)
                        $("ul.pagination").append(
                            `<li class="pageNumber active no-click"><a>${item.label}</a></li>`
                        );
                    else if (!item.url)
                        $("ul.pagination").append(
                            `<li class="pageNumber no-click"><a>${item.label}</a></li>`
                        );
                    else
                        $("ul.pagination").append(
                            `<li class="pageNumber"><a href="${
                                location.pathname
                            }?page=${item.url.split("?page=")[1]}">${
                                item.label
                            }</a></li>`
                        );
                }
            } else {
                $("tbody").append(
                    `<tr>
											<td colspan="6"><p>Sense Alumnes.</p></td>
									</tr>`
                );
            }

            $("tbody").fadeIn(300);
            $("body").addClass("body-logs");
        },
        error: (res) => {
            console.log(res);
        },
    });
}

function filterCareerPage() {
    const term_id = getUrlParameter("term");
    console.log(term_id);

    data = {};
    formChildren = $("section.filter > *");
    for (const elem of formChildren) {
        if (elem.value != "") {
            data[elem.name] = elem.value;
            console.log(data[elem.name]);
        }
    }

    $.ajax({
        url:
            $("meta[name='url']").attr("content") +
            "?term=" +
            term_id +
            "&filter=" +
            encodeURI(JSON.stringify(data)),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
            "term-id": !term_id ? "empty" : term_id,
        },
        success: (res) => {
            if (res.status) {
                generateMessages(
                    res.status,
                    res.text,
                    ".container-messages",
                    3
                );
                // setTimeout(() => location.href = "/admin/dashboard/terms", 3000);
            } else {
                $("tbody").css("display", "none").html("");
                if (res.length > 0) {
                    for (const item of res) {
                        let end = momentFormat(item.end, null, "DD-MM-YYYY");
                        if (end == "Invalid date") {
                            end = null;
                        }
                        $("tbody").append(
                            insertNewRow(
                                item.id,
                                item.code,
                                item.name,
                                item.description,
                                item.hours,
                                momentFormat(
                                    item.start,
                                    "YYYY-MM-DD",
                                    "DD-MM-YYYY"
                                ),
                                end,
                                null,
                                "careers"
                            )
                        );
                    }
                } else {
                    $("tbody").append(
                        `<tr>
											<td colspan="9"><p>No s'ha trobat cap cicle.</p></td>
									</tr>`
                    );
                }
                $("tbody")
                    .append(
                        `<tr>
									<td colspan="9"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegeix un nou curs</button></td>
							</tr>`
                    )
                    .fadeIn(300);

                $("body").addClass("body-term");
                $("#new, #edit").on("click", (e) =>
                    rowEventEditAndNew(e.target, "careers")
                );
            }
        },
        error: (res) => {
            console.log(res.responseJSON);
        },
    });
}

/**
 * @description "get parameter value from url"
 * @param {String} param
 */
function getUrlParameter(param) {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get(param);
}

/**
 * @description "format date in a new"
 * @param {String} value "value of a date, time or both"
 * @param {String} valFormat "format of '@param value' (ex. MM:DD:YYYY)"
 * @param {String} newFormat "new format for '@param value' (ex. DD:MM:YY)"
 * @return {String}
 */
function momentFormat(value, valFormat, newFormat) {
    return moment(value, valFormat).format(newFormat);
}

/**
 * @description "return actual day and time"
 * @return {String}
 */
function now() {
    return moment().format("DD/MM/YYYY HH:mm:ss");
}

/* GENERATE MESSAGES */
let cont = 1;

/**
 * @description "generate messages with different types"
 * @param {String} type ("success", "error", "warning", "info")
 * @param {String} text
 * @param {String} parentName (XPath route for JQuery)
 * @param {Number} seconds
 */
function generateMessages(type, text, parentName, seconds) {
    const icons = {
        success: "far fa-check-circle",
        error: "far fa-times-circle",
        warning: "fas fa-exclamation-triangle",
        info: "fas fa-info-circle",
    };
    $(parentName).prepend(
        `<div id="${cont}" class="message msg-${type}"><i class="${icons[type]}"></i> ${text}</div>`
    );
    setTimeout(() => {
        $(parentName + " .message:nth-child(1)").fadeIn();
        countdown(parentName, cont, seconds);
        cont++;
    }, 1);
}

/**
 * @description "countdown for remove the message"
 * @param {String} parentName (XPath route for JQuery)
 * @param {Number} id "auto generate ID"
 * @param {Number} seconds
 */
function countdown(parentName, id, seconds) {
    setTimeout(() => {
        $(parentName + " .message#" + id).fadeOut(400, () =>
            $(parentName + " .message")
                .last()
                .remove()
        );
    }, seconds * 1000);
}

/* LOGS */
/**
 * @description "load all the data of the logs end point in the tbody HTML"
 */
function loadLogsPage() {
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            $("tbody").css("display", "none").html("");
            if (res.length > 0) {
                console.table(res);
                for (const item of res) {
                    var msg = "";
                    try {
                        msg = JSON.parse(item.message).message;
                    } catch (e) {
                        msg = item.message;
                    }
                    var output_badge =
                        item.level == 200
                            ? (output_badge =
                                  '<span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">Info</span>')
                            : (output_badge = item.level);

                    $("tbody").append(
                        insertNewRow(
                            item.id,
                            item.name,
                            output_badge,
                            msg,
                            momentFormat(
                                item.updated_at,
                                "YYYY-DD-MM hh:mm:ss",
                                "DD/MM/YYYY HH:mm:ss"
                            ),
                            null,
                            "logs"
                        )
                    );
                }
            } else {
                $("tbody").append(
                    `<tr>
                        <td colspan="5"><p>Sense Logs.</p></td>
                    </tr>`
                );
            }

            $("tbody").fadeIn(300);
            $("body").addClass("body-logs");
        },
    });
}

/* ADMIN */
/**
 * @description "load all the functionalities of the admins in HTML"
 */
function loadAdminsPage() {
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            $("tbody").css("display", "none").html("");
            if (res.length > 0) {
                let contRows = 0;
                for (const item of res) {
                    $("tbody").append(
                        insertNewRow(
                            item.id,
                            item.name,
                            item.email,
                            item.firstname,
                            item.lastname1,
                            item.lastname2,
                            contRows,
                            "admins"
                        )
                    );
                    contRows++;
                }
            } else {
                $("tbody").append(
                    `<tr>
                        <td colspan="10"><p>No s'ha trobat cap admin que no siguis tu.</p></td>
                    </tr>`
                );
            }
            $("tbody")
                .append(
                    `<tr>
                    <td colspan="10"><button type="button" id="new" class="btn secondary-btn"><i class="fas fa-user"></i> Afegeix un nou admin</button></td>
                </tr>`
                )
                .fadeIn(300);

            $("body").addClass("body-term");
            $("#new, #edit").on("click", (e) =>
                rowEventEditAndNew(e.target, "admins")
            );
        },
    });
}

/* STUDENTS */
/**
 * @description "load all the data of the students end point in the tbody HTML"
 * @param {String} url "URL of endpoint"
 */
function loadStudentsPage(url = $("meta[name='url']").attr("content")) {
    $.ajax({
        url: url,
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            console.log(res);
            $("tbody").css("display", "none").html("");
            if (res.data.length > 0) {
                for (const item of res.data) {
                    let state = "";
                    if (item.state === "pending") {
                        state = `<div class="circle-box" title="Pendent"><div class="circle orange"></div></div>`;
                    } else if (item.state === "unregistered") {
                        state = `<div class="circle-box" title="Sense Registrar"><div class="circle gray"></div></div>`;
                    }
                    $("tbody").append(
                        insertNewRow(
                            item.firstname,
                            item.lastname1 + " " + item.lastname2,
                            item.email,
                            item.name,
                            state,
                            `?student=${item.id}&term=${item.term_id}`,
                            "students"
                        )
                    );
                }
                $("ul.pagination").html("");
                for (const item of res.links) {
                    if (item.label === "&laquo; Previous")
                        item.label = '<i class="fas fa-angle-left"></i>';
                    else if (item.label === "Next &raquo;")
                        item.label = '<i class="fas fa-angle-right"></i>';

                    if (item.active)
                        $("ul.pagination").append(
                            `<li class="pageNumber active no-click"><a>${item.label}</a></li>`
                        );
                    else if (!item.url)
                        $("ul.pagination").append(
                            `<li class="pageNumber no-click"><a>${item.label}</a></li>`
                        );
                    else
                        $("ul.pagination").append(
                            `<li class="pageNumber"><a href="${
                                location.pathname
                            }?page=${item.url.split("?page=")[1]}">${
                                item.label
                            }</a></li>`
                        );
                }
            } else {
                $("tbody").append(
                    `<tr>
                        <td colspan="6"><p>Sense Alumnes.</p></td>
                    </tr>`
                );
            }

            $("tbody").fadeIn(300);
            $("body").addClass("body-logs");
        },
        error: (res) => {
            console.log(res);
        },
    });
}

/* TERMS */
const dataPickerOptions = {
    closeText: "Cerrar",
    prevText: "<Ant",
    nextText: "Sig>",
    currentText: "Hoy",
    monthNames: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
    ],
    monthNamesShort: [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
    ],
    dayNames: [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
    ],
    dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
    dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
    weekHeader: "Sm",
    dateFormat: "dd/mm/yy",
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: "",
};

/**
 * @description "load all the data of the terms end point in the tbody HTML"
 */
function loadTermPage() {
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            $("tbody").css("display", "none").html("");
            if (res.length > 0) {
                let contRows = 0;
                for (const item of res) {
                    $("tbody").append(
                        insertNewRow(
                            item.id,
                            `<a class="link" href="/admin/dashboard/careers?term=${item.id}">${item.name}</a>`,
                            item.description,
                            momentFormat(
                                item.start,
                                "YYYY-MM-DD",
                                "DD-MM-YYYY"
                            ),
                            momentFormat(item.end, "YYYY-MM-DD", "DD-MM-YYYY"),
                            momentFormat(
                                item.created_at,
                                "",
                                "DD/MM/YYYY HH:mm:ss"
                            ),
                            momentFormat(
                                item.updated_at,
                                "",
                                "DD/MM/YYYY HH:mm:ss"
                            ),
                            contRows,
                            "terms"
                        )
                    );
                    contRows++;
                }
            } else {
                $("tbody").append(
                    `<tr>
                        <td colspan="10"><p>No s'ha trobat cap curs.</p></td>
                    </tr>`
                );
            }
            $("tbody")
                .append(
                    `<tr>
                    <td colspan="10"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegeix un nou curs</button></td>
                </tr>`
                )
                .fadeIn(300);

            $("body").addClass("body-term");
            $("#new, #edit").on("click", (e) =>
                rowEventEditAndNew(e.target, "terms")
            );
            console.log($(".clone"));
            $(".clone").on("click", (e) => eventCloneCareer(e.target, res));
        },
    });
}

/**
 * @description "load all the data of the career end point in the tbody HTML"
 */
function loadCareerPage() {
    const term_id = getUrlParameter("term");
    console.log(term_id);
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
            "term-id": !term_id ? "empty" : term_id,
        },
        success: (res) => {
            if (res.status) {
                generateMessages(
                    res.status,
                    res.text,
                    ".container-messages",
                    3
                );
                // setTimeout(() => location.href = "/admin/dashboard/terms", 3000);
            } else {
                $("tbody").css("display", "none").html("");
                if (res.length > 0) {
                    for (const item of res) {
                        let end = momentFormat(item.end, null, "DD-MM-YYYY");
                        if (end == "Invalid date") {
                            end = null;
                        }
                        $("tbody").append(
                            insertNewRow(
                                item.id,
                                item.code,
                                item.name,
                                item.description,
                                item.hours,
                                momentFormat(
                                    item.start,
                                    "YYYY-MM-DD",
                                    "DD-MM-YYYY"
                                ),
                                end,
                                null,
                                "careers"
                            )
                        );
                    }
                } else {
                    $("tbody").append(
                        `<tr>
                        <td colspan="9"><p>No s'ha trobat cap cicle.</p></td>
                    </tr>`
                    );
                }
                $("tbody")
                    .append(
                        `<tr>
                    <td colspan="9"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegeix un nou curs</button></td>
                </tr>`
                    )
                    .fadeIn(300);

                $("body").addClass("body-term");
                $("#new, #edit").on("click", (e) =>
                    rowEventEditAndNew(e.target, "careers")
                );
            }
        },
        error: (res) => {
            console.log(res.responseJSON);
        },
    });
}

/**
 * @description "load all the data of the logs end point in the tbody HTML"
 */
function loadLogsPage() {
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            for (const item of res) {
                console.log(item);
                var tmp = JSON.parse(item.message);
                var output_badge = "";
                if (item.level == 200) {
                    output_badge =
                        '<span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-blue-600 bg-blue-200 uppercase last:mr-0 mr-1">Info</span>';
                }
                $("tbody").append(
                    insertNewRow(
                        item.id,
                        item.name,
                        output_badge,
                        tmp.message,
                        momentFormat(
                            item.updated_at,
                            "YYYY-DD-MM hh:mm:ss",
                            "DD/MM/YYYY HH:mm:ss"
                        ),
                        null,
                        "logs"
                    )
                );
            }
            $("tbody").fadeIn(300);
            $("body").addClass("body-logs");
        },
    });
}

/**
 * @description "load all the data of the logs end point in the tbody HTML"
 */
function loadAdminMatriculationPage() {
    const userId = getUrlParameter("student");
    const termId = getUrlParameter("term");
    if (userId === "new") {
        $("form input[name='_method']").remove();
        $("form .account-user").css("display", "none");
        $("form .new-user").css("display", "flex");
        $("form .modules").css("display", "none");
        $.ajax({
            url: $("meta[name='url']").attr("content"),
            method: "GET",
            headers: {
                token: $("meta[name='_token']").attr("content"),
                user_id: userId,
                term_id: "new",
            },
            success: (res) => {
                var firstTerm = null;
                var firstBool = true;
                for (const term of res.terms) {
                    if (firstBool) {
                        firstTerm = term.id;
                        firstBool = false;
                    }
                    $("select#term").append(
                        `<option value="${term.id}">${term.id} - ${term.name}</option>`
                    );
                }
                for (const career of res.careers) {
                    if (career.active == 1 && career.term_id == firstTerm) {
                        $("select#career").append(
                            `<option value="${career.id}">${career.id} - ${career.name}</option>`
                        );
                    }
                }
                $("select#term").on("change", function (e) {
                    var selected = $('select[name="term"]').val();
                    $("select#career").html("");
                    for (const career of res.careers) {
                        if (career.active == 1 && career.term_id == selected) {
                            $("select#career").append(
                                `<option value="${career.id}">${career.id} - ${career.name}</option>`
                            );
                        }
                    }
                });
            },
        });
    } else {
        $.ajax({
            url: $("meta[name='url']").attr("content"),
            method: "GET",
            headers: {
                token: $("meta[name='_token']").attr("content"),
                user_id: userId,
                term_id: termId,
            },
            success: (res) => {
                console.log(res);
                $("#user_id").val(userId);
                $("#term_id").val(termId);
                $("#firstname").val(res.user.firstname);
                $("#lastname1").val(res.user.lastname1);
                $("#lastname2").val(res.user.lastname2);
                $("#email").val(res.user.email);
                $("#dni").val(res.enrolment.dni);
                $("#name").val(res.user.name);
                $("#term2").val(
                    res.career.term_name +
                        " (" +
                        momentFormat(
                            res.career.start,
                            "YYYY-MM-DD",
                            "DD/MM/YYYY"
                        ) +
                        "-" +
                        momentFormat(
                            res.career.end,
                            "YYYY-MM-DD",
                            "DD/MM/YYYY"
                        ) +
                        ")"
                );
                $("#career2").val(
                    res.career.career_code + " - " + res.career.career_name
                );
                for (const module of res.mps) {
                    $("#modules").append(
                        `<div class="tag">${module.code}: ${module.name}</div>`
                    );
                }
                let filesHtml = "";
                for (const file of res.files) {
                    let statusFile = `Estat: <div class="state red"></div> Sense pujar <div class="state red"></div>`;
                    let image = `<button type="button" data-id="${file.upload_id}" class="btn primary-btn get-image"><i class="fas fa-eye"></i> Veure</button>`;
                    $(".req .profile-name span").text(file.profile_name);
                    if (file.status == "registered") {
                        statusFile = `Estat: <div class="state orange"></div> Sense pujar <div class="state orange"></div>`;
                    }
                    filesHtml += `                    
                    <div class="file">
                        <div class="header">
                            <p>${file.req_name}</p>
                        </div>
                        <div class="body">
                            <div class="icons">
                                <i class="fas fa-file"></i>
                                <i class="fas fa-image"></i>
                            </div>
                            <img data-src="" class="dis-none" />
                            ${image}
                        </div>
                        <div class="footer">
                            <div>${statusFile}</div>
                        </div>
                    </div>`;
                }
                $(".req .files").append(filesHtml);
                $("tbody").fadeIn(300);
                $("body").addClass("body-logs");
                $(".file .body .get-image").on("click", async function (e) {
                    const uploadId = $(e.target).attr("data-id");
                    if (!$(e.target).prev().attr("data-src")) {
                        await $.ajax({
                            url: "/api/uploads",
                            method: "GET",
                            headers: {
                                token: $("meta[name='_token']").attr("content"),
                                upload_id: uploadId,
                            },
                            success: async (res) => {
                                $(e.target).prev().attr("data-src", res.data);
                            },
                        });
                    }
                    $(".bg-image img").attr(
                        "src",
                        $(e.target).prev().attr("data-src")
                    );
                    $(".bg-image").fadeIn(400);
                });
                $(".form-alumn-data").prop(
                    "action",
                    $("meta[name='url']").attr("content") +
                        "/" +
                        res.enrolment.id
                );
            },
        });
        $(".enrolments .bg-image div.close").on("click", function (e) {
            $(".bg-image").fadeOut(400);
        });
    }
}

/**
 * @description "load all the data of the logs end point in the tbody HTML"
 */
function loadProfileReqPage() {
    $("body").addClass("body-term");
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "GET",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: async (res) => {
            $(".cards").html("");
            if (res.status) {
                generateMessages(
                    res.status,
                    res.text,
                    ".container-messages",
                    3
                );
                $(".cards").append(`<p class="without">${res.text}</p>`);
            } else {
                for (const profile of res) {
                    let card = `
                <div class="card-box">
                    <div class="card" style="display: none" data-id="${profile.id}">
                        <div class="header">
                            <p>${profile.id} - ${profile.name}</p>
                        </div>
                        <div class="body">
                            <p class="title">Requeriments</p>
                            <button type="button" class="btn primary-btn" id="new">Nou requeriment</button>`;
                    await $.ajax({
                        url: "/api/requirements",
                        method: "GET",
                        headers: {
                            token: $("meta[name='_token']").attr("content"),
                            profile_req_id: profile.id,
                        },
                        success: (res) => {
                            if (res.status) {
                                card += `<div class="row-req" data-id="null">
                            <p style="text-align:center;">${res.text}</p>
                        </div>`;
                            } else {
                                for (const req of res) {
                                    card += `<div class="row-req" data-id="${req.id}">
                            <p class="name-req">${req.name}</p>
                            <div class="btns">
								<button class="btn save edit"><i class="fas fa-pen"></i></button>
								<button class="btn cancel remove"><i class="fas fa-trash"></i></button>
							</div>
                        </div>`;
                                }
                            }
                        },
                    });
                    card += `
                    </div>
                    <div class="footer">
                        <button class="btn save edit"><i class="fas fa-pen"></i> Editar</button>
                        <button class="btn cancel remove"><i class="fas fa-trash"></i> Eliminar</button>
                    </div>
                </div>`;
                    $(".cards").append(card);
                    $(".card").last().fadeIn(400);
                }
            }

            $(".cards #new, .card .btns .edit").on("click", function (e) {
                const tag = e.target;
                let id = $(e.target).closest(".row-req").attr("data-id");
                $("html").css("overflow", "hidden");
                $(".bg-dialog").addClass("bg-opacity");
                const rowSelected = id ? $(tag).closest(".row-req") : null;
                let nameReq = $(rowSelected).children("p").text();
                let dialog = $(".modal-req").dialog({
                    modal: true,
                    dialogClass: "dialog-top",
                    buttons: {
                        Desa: () => {
                            if (!isNull($(".modal-req #name").val())) {
                                dialog.dialog("close");
                                updateOrCreateRequirement(tag.id, id);
                                $("html").css("overflow", "auto");
                                setTimeout(
                                    () =>
                                        $(".bg-dialog").removeClass(
                                            "bg-opacity"
                                        ),
                                    700
                                );
                            } else {
                                generateMessages(
                                    "error",
                                    "El nom no pot estar buit.",
                                    ".container-messages",
                                    3
                                );
                            }
                        },
                        Cancela: () => {
                            dialog.dialog("close");
                            $("html").css("overflow", "auto");
                            setTimeout(
                                () => $(".bg-dialog").removeClass("bg-opacity"),
                                700
                            );
                        },
                    },
                    close: () => {
                        $("html").css("overflow", "auto");
                        $(".bg-dialog").removeClass("bg-opacity");
                    },
                    show: {
                        effect: "fold",
                        duration: 700,
                    },
                    hide: {
                        effect: "fold",
                        duration: 700,
                    },
                });
                $(".modal-req select#profile_id").html("");
                if (tag.id == "new") {
                    $(".modal-req #name").val("");
                    for (const profile of res) {
                        const profileIdSelected = $(tag)
                            .closest(".card")
                            .attr("data-id");
                        if (profileIdSelected == profile.id) {
                            $("select#profile_id").append(
                                `<option selected value="${profile.id}">${profile.id} - ${profile.name}</option>`
                            );
                        } else {
                            $("select#profile_id").append(
                                `<option value="${profile.id}">${profile.id} - ${profile.name}</option>`
                            );
                        }
                    }
                } else {
                    for (const profile of res) {
                        const profileIdSelected = $(tag)
                            .closest(".card")
                            .attr("data-id");
                        if (profileIdSelected == profile.id) {
                            $("select#profile_id").append(
                                `<option value="${profile.id}">${profile.id} - ${profile.name}</option>`
                            );
                        }
                    }
                    $(".modal-req #name").val(nameReq);
                }

                let childrens = $(".ui-dialog-buttonset")
                    .addClass("buttons-group")
                    .children();
                $(childrens[1]).attr("class", "btn cancel");
                $(".ui-dialog-titlebar-close").html(
                    '<i class="fas fa-times-circle"></i>'
                );
                $(childrens[0])
                    .attr("class", "btn save")
                    .text(tag.id === "new" ? "Crea" : "Desa")
                    .after('<div class="or"></div>');
                $(".ui-dialog-title").text(
                    tag.id === "new" ? "Nou" : "Modicació"
                );
            });

            $(".btn-create-profile #new-profile, .footer .edit").on(
                "click",
                function (e) {
                    const tag = e.target;
                    let id = $(tag).closest(".card").attr("data-id");
                    $("html").css("overflow", "hidden");
                    $(".bg-dialog").addClass("bg-opacity");
                    const rowSelected = id ? $(tag).closest(".card") : null;
                    let nameReq = $(rowSelected)
                        .children(".header")
                        .children("p")
                        .text()
                        .split(" - ")[1];
                    let dialog = $(".modal-profile-req").dialog({
                        modal: true,
                        dialogClass: "dialog-top",
                        buttons: {
                            Desa: () => {
                                if (
                                    !isNull($(".modal-profile-req #name").val())
                                ) {
                                    dialog.dialog("close");
                                    updateOrCreateProfile(tag.id, id);
                                    $("html").css("overflow", "auto");
                                    setTimeout(
                                        () =>
                                            $(".bg-dialog").removeClass(
                                                "bg-opacity"
                                            ),
                                        700
                                    );
                                } else {
                                    generateMessages(
                                        "error",
                                        "El nom no pot estar buit.",
                                        ".container-messages",
                                        3
                                    );
                                }
                            },
                            Cancela: () => {
                                dialog.dialog("close");
                                $("html").css("overflow", "auto");
                                setTimeout(
                                    () =>
                                        $(".bg-dialog").removeClass(
                                            "bg-opacity"
                                        ),
                                    700
                                );
                            },
                        },
                        close: () => {
                            $("html").css("overflow", "auto");
                            $(".bg-dialog").removeClass("bg-opacity");
                        },
                        show: {
                            effect: "fold",
                            duration: 700,
                        },
                        hide: {
                            effect: "fold",
                            duration: 700,
                        },
                    });
                    $(".modal-profile-req select#profile_id").html("");
                    if (tag.id == "new-profile") {
                        $(".modal-profile-req #name").val("");
                    } else {
                        $(".modal-profile-req #name").val(nameReq);
                    }
                    let childrens = $(".ui-dialog-buttonset")
                        .addClass("buttons-group")
                        .children();
                    $(childrens[1]).attr("class", "btn cancel");
                    $(".ui-dialog-titlebar-close").html(
                        '<i class="fas fa-times-circle"></i>'
                    );
                    $(childrens[0])
                        .attr("class", "btn save")
                        .text(tag.id === "new-profile" ? "Crea" : "Desa")
                        .after('<div class="or"></div>');
                    $(".ui-dialog-title").text(
                        tag.id === "new-profile" ? "Nou" : "Modicació"
                    );
                }
            );

            $(".btns .cancel.remove").on("click", function (e) {
                let id = $(e.target).closest(".row-req").attr("data-id");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/api/requirements/" + id,
                    type: "DELETE",
                    data: {
                        id,
                    },
                    success: function (res) {
                        generateMessages(
                            res.status,
                            res.text,
                            ".container-messages",
                            3
                        );
                        if (res.status === "success") {
                            loadProfileReqPage();
                        }
                    },
                });
            });

            $(".footer .cancel.remove").on("click", function (e) {
                let id = $(e.target).closest(".card").attr("data-id");
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: $("meta[name='url']").attr("content") + "/" + id,
                    type: "DELETE",
                    data: {
                        id,
                    },
                    success: function (res) {
                        generateMessages(
                            res.status,
                            res.text,
                            ".container-messages",
                            3
                        );
                        if (res.status === "success") {
                            loadProfileReqPage();
                        }
                    },
                });
            });
        },
    });
}

function updateOrCreateProfile(method, id) {
    let url = null;
    let data = null;
    const name = $(".modal-profile-req #name").val();
    if (method == "new-profile") {
        url = $("meta[name='url']").attr("content");
        data = {
            name,
        };
    } else {
        url = $("meta[name='url']").attr("content") + "/" + id;
        data = {
            _method: "PUT",
            name,
            id,
        };
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url,
        type: "POST",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data,
        success: function (res) {
            generateMessages(res.status, res.text, ".container-messages", 3);
            if (res.status === "success") {
                loadProfileReqPage();
            }
        },
    });
}

function updateOrCreateRequirement(method, id) {
    let url = null;
    let data = null;
    const profile_id = $(".modal-req #profile_id").val();
    const name = $(".modal-req #name").val();
    if (method == "new") {
        url = "/api/requirements";
        data = {
            profile_id,
            name,
        };
    } else {
        url = "/api/requirements/" + id;
        data = {
            _method: "PUT",
            profile_id,
            name,
        };
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url,
        type: "POST",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data,
        success: function (res) {
            generateMessages(res.status, res.text, ".container-messages", 3);
            if (res.status === "success") {
                loadProfileReqPage();
            }
        },
    });
}

/**
 * @description "load all the data of the import end point in the tbody HTML"
 * @param {JSON} careers "json with the careers"
 */
function loadImportPage(careers) {
    let arrayCareers = [];
    let cont = 0;
    let rows = "";
    // Create all rows
    for (const key in careers) {
        if (Object.hasOwnProperty.call(careers, key)) {
            careers[key]["CODI"] = key;
            arrayCareers.push(careers[key]);
            let dataRow = `
            <div class="container-cb">
                <input name="check-${cont}" id="check-${cont}" type="checkbox">
                <label for="check-${cont}">
                    <i class="fa fa-check"></i>
                </label>
            </div>
            <label class="text" for="check-${cont}">${key} - ${careers[key]["NOM_CICLE_FORMATIU"]}</label>
            <div class="row-bg"></div>`;
            rows += insertNewRow(dataRow, null, "import");
            cont++;
        }
    }
    $("tbody").css("display", "none").html(rows).fadeIn(300);
    animationSelectedRow();

    $(".btn-start-import button").on("click", () => {
        const checkboxes = $(".container-cb>input[type='checkbox']:checked");
        let selectedRows = [];
        if (checkboxes.length > 0) {
            generateMessages(
                "info",
                "La importació ha començat.",
                ".container-messages",
                2.5
            );
            $(".btn-start-import button").html("").addClass("loading no-click");
            for (const item of checkboxes) {
                const index = $(item).prop("name").split("-")[1];
                selectedRows.push(arrayCareers[index]);
            }
            console.table(selectedRows);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            var term_id = getUrlParameter("term");
            var data = JSON.stringify(selectedRows);

            $.ajax({
                url: "/api/import",
                method: "POST",
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                data: {
                    data,
                    term_id,
                },
                success: (res) => {
                    localStorage.removeItem("careers_json");
                    location.href = `/admin/dashboard/careers?term=${getUrlParameter(
                        "term"
                    )}`;
                },
                error: (res) => {
                    generateMessages(
                        "error",
                        "Error al servidor",
                        ".container-messages",
                        2.5
                    );
                    console.log(res);
                },
            });
        } else
            generateMessages(
                "error",
                "No s'ha seleccionat cap cicle.",
                ".container-messages",
                2.5
            );
    });
    generateMessages(
        "success",
        "Arxiu carregat correctament.",
        ".container-messages",
        2.5
    );
}

/**
 * @description "load all the data of the career end point in the tbody HTML"
 * @param {String} "actual page (careers|students)"
 */
function importCSV(page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    if (page == "careers") {
        $("#remove").html("").addClass("loading");
        var fr = new FileReader();
        fr.onload = function () {
            var file = fr.result;
            $.ajax({
                url: "/api/import",
                method: "POST",
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                data: {
                    import_file: "csv",
                    file,
                },
                success: (res) => {
                    console.log(res);
                    $("#form-file").trigger("reset");
                    localStorage.setItem("careers_json", res);
                    location.href = `/admin/dashboard/careers/import?term=${getUrlParameter(
                        "term"
                    )}`;
                },
                error: (res) => {
                    $("#form-file").trigger("reset");
                    console.log(res);
                },
            });
        };
        fr.readAsDataURL($("#file-csv")[0].files[0]);
    } else if (page == "students") {
        var fr = new FileReader();
        fr.onload = function () {
            var file = fr.result;
            $.ajax({
                url: $("meta[name='url']").attr("content"),
                method: "POST",
                headers: {
                    token: $("meta[name='_token']").attr("content"),
                },
                data: {
                    import_file: "csv",
                    file,
                },
                success: (res) => {
                    $("#form-file").trigger("reset");
                    generateMessages(
                        res.status,
                        res.text,
                        ".container-messages",
                        3
                    );
                    $("tbody").html("");
                    loadStudentsPage();
                },
                error: (res) => {
                    $("#form-file").trigger("reset");
                    console.log(res.responseJSON.message);
                    location.reload();
                    generateMessages(
                        "error",
                        "Alguns usuaris ja existeixen",
                        ".container-messages",
                        3
                    );
                },
            });
        };
        fr.readAsDataURL($("#file")[0].files[0]);
    }
}

function importIMG(doc_name) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var fr = new FileReader(doc_name);
    fr.onload = function () {
        var file = fr.result;
        $.ajax({
            url: "/api/documents",
            method: "POST",
            headers: {
                token: $("meta[name='_token']").attr("content"),
            },
            data: {
                import_file: doc_name,
                file,
            },
            success: (res) => {
                generateMessages(
                    res.status,
                    res.text,
                    ".container-messages",
                    3
                );
                $("tbody").html("");
            },
            error: (res) => {
                console.log(res.responseJSON.message);
                generateMessages(
                    "error",
                    "Error al pujar el Document, intenta-ho més tard",
                    ".container-messages",
                    3
                );
            },
        });
    };
    fr.readAsDataURL($("#" + doc_name)[0].files[0]);
}

/**
 *  @description "event for clone the term"
 */
function eventCloneCareer(row, json) {
    const rowSelected = $(row).closest("button").attr("data");
    const termId = json[rowSelected].id;
    let btn = $(row).closest("button");
    btn.html('<i class="fas fa-load" aria-hidden="true"></i>');
    btn.addClass("loading");
    $.ajax({
        url: `/api/duplicate/${termId}`,
        method: "POST",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data: {
            id: termId,
        },
        success: (res) => {
            location.reload();
        },
        error: (res) => {
            console.log(res);
        },
    });
}

/**
 * @description "callback function event for create or edit term"
 * @param {Element} tag "Event onClick: DOM Element tag pressed"
 * @param {String} page "actual page"
 */
function rowEventEditAndNew(tag, page) {
    $("html").css("overflow", "hidden");
    $(".bg-dialog").addClass("bg-opacity");
    const rowSelected = $(tag).closest("tr");
    let dialog = $(".modal-term").dialog({
        modal: true,
        dialogClass: "dialog-top",
        buttons: {
            Desa: () => {
                if (validationTermForm(page)) {
                    dialog.dialog("close");
                    if (page === "terms") {
                        updateTableRowTerm(rowSelected.children());
                    } else if (page === "careers") {
                        updateTableRowCareers(rowSelected.children());
                    } else if (page === "admins") {
                        updateTableRowAdmin(rowSelected.children());
                    }
                    $("html").css("overflow", "auto");
                    setTimeout(
                        () => $(".bg-dialog").removeClass("bg-opacity"),
                        700
                    );
                }
            },
            Cancela: () => {
                dialog.dialog("close");
                $("html").css("overflow", "auto");
                setTimeout(
                    () => $(".bg-dialog").removeClass("bg-opacity"),
                    700
                );
            },
        },
        close: () => {
            $("html").css("overflow", "auto");
            $(".bg-dialog").removeClass("bg-opacity");
        },
        show: {
            effect: "fold",
            duration: 700,
        },
        hide: {
            effect: "fold",
            duration: 700,
        },
    });
    let childrens = $(".ui-dialog-buttonset")
        .addClass("buttons-group")
        .children();
    $(childrens[1]).attr("class", "btn cancel");
    $(childrens[0])
        .attr("class", "btn save")
        .text(tag.id === "new" ? "Crea" : "Desa")
        .after('<div class="or"></div>');
    $(".ui-dialog-title").text(tag.id === "new" ? "Nou" : "Modicació");
    $(".ui-dialog-titlebar-close").html('<i class="fas fa-times-circle"></i>');
    $(".ui-dialog").prev().addClass(page);
    const cols = rowSelected.children();
    if (page === "terms") {
        const colsValues = [cols[1], cols[2], cols[3], cols[4]];
        const inputsIds = ["name", "description", "start", "end"];
        getInfoForModal(colsValues, inputsIds);
    } else if (page === "careers") {
        const colsValues = [
            cols[1],
            cols[2],
            cols[3],
            cols[4],
            cols[5],
            cols[6],
        ];
        const inputsIds = [
            "code",
            "name",
            "description",
            "hours",
            "start",
            "end",
        ];
        getInfoForModal(colsValues, inputsIds);
    } else if (page === "admins") {
        const colsValues = [
            cols[0],
            cols[1],
            cols[2],
            cols[3],
            cols[4],
            cols[5],
        ];
        const inputsIds = [
            "id",
            "user",
            "email",
            "name",
            "surname",
            "secondsurname",
        ];
        getInfoForModal(colsValues, inputsIds);
    }
}

/**
 * @description "get row information for dialog modal"
 * @param {*} colsValues "selected row"
 * @param {*} inputsIds "inputs of modal"
 */
function getInfoForModal(colsValues, inputsIds) {
    for (let i = 0; i < colsValues.length; i++) {
        $(`.label-group input#${inputsIds[i]}`).val($(colsValues[i]).text());
    }
}

/**
 * @description "animation for selected careers in careers import page"
 */
function animationSelectedRow() {
    $("label").click(function () {
        let rowBackground = $(this).closest("td").children(".row-bg");
        let input = $(this)
            .closest("td")
            .children(".container-cb")
            .children("input");
        rowBackground.animate({
            width: input.is(":checked") ? "0vw" : "100vw",
        });
    });
}

/**
 * @description "insert new row in the table body"
 * @param  {...any} params "num n of parameters (last parameter define the actual page 'terms|logs|students|import')"
 * @return {String}
 */
function insertNewRow(...params) {
    let row = "<tr>";
    for (let i = 0; i < params.length - 2; i++) {
        row += `<td>${params[i] ? params[i] : ""}</td>`;
    }

    let lastParam = params[params.length - 1];
    if (lastParam == "terms") {
        row += `<td><button id="edit" class="btn save" title="Modificar"><i class="fas fa-pen"></i></button></td>
                <td><a href="/admin/dashboard/${lastParam}/delete/${
            params[0]
        }" class="btn cancel" title="Elimina"><i class="fas fa-trash"></i></a></td>
                <td><button class="btn save clone" data="${
                    params[params.length - 2]
                }" title="Clonar"><i class="fas fa-clone"></i></button></td>`;
    } else if (lastParam == "careers") {
        row += `<td><button id="edit" class="btn save" title="Modificar"><i class="fas fa-pen"></i></button></td>
                <td><a href="/admin/dashboard/${lastParam}/delete/${
            params[0]
        }?term=${getUrlParameter(
            "term"
        )}" class="btn cancel" title="Elimina"><i class="fas fa-trash"></i></a></td>`;
    } else if (lastParam == "students") {
        row += `<td><a href="/admin/dashboard/students/matriculation?student=${
            params[params.length - 2]
        }" id="view" class="btn save" title="Dades"><i class="fas fa-eye"></i></button></td>`;
    } else if (lastParam == "admins") {
        row += `<td><button id="edit" class="btn save" title="Modificar"><i class="fas fa-pen"></i></button></td>
               <td><button class="btn cancel" title="Elimina" onclick="deleteAdmin(${params[0]})"><i class="fas fa-trash"></i></button></td>`;
    }
    return row + "</tr>";
}

function deleteAdmin(id) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: `/api/admins/${id}`,
        type: "DELETE",
        data: { id },
        success: function (result) {
            loadAdminsPage();
        },
    });
}

/**
 * @description "insert new row in the terms table of the DB with AJAX"
 * @param {JSON} data "data body information"
 * @param {String} page "actual page"
 */
function insertRowInDB(data, page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: "POST",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data,
        success: (res) => {
            generateMessages("success", res.status, ".container-messages", 3);
            if (page === "terms") {
                loadTermPage();
            } else if (page === "careers") {
                loadCareerPage();
            } else if (page === "admins") {
                loadAdminsPage();
            }
        },
        error: (res) => {
            console.log(res.responseJSON.message);
            generateMessages(
                "error",
                "Error al servidor",
                ".container-messages",
                3
            );
        },
    });
}

/**
 * @description "update row in the terms table of the DB with AJAX"
 * @param {JSON} data "data body information"
 * @param {String} page "actual page"
 */
function updateRowInDB(data, page) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: $("meta[name='url']").attr("content") + "/" + data.id,
        method: "PUT",
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data,
        success: (res) => {
            generateMessages("success", res.status, ".container-messages", 3);
            if (data.type === "softDelete") {
                setTimeout(() => {
                    $("#remove").html("Eliminar").removeClass("loading");
                    if (page === "terms") {
                        location.href = `/admin/dashboard/${page}`;
                    } else if (page === "careers") {
                        location.href = `/admin/dashboard/${page}?term=${getUrlParameter(
                            "term"
                        )}`;
                    }
                }, 2000);
            } else {
                if (page === "terms") {
                    loadTermPage();
                } else if (page === "careers") {
                    loadCareerPage();
                }
            }
        },
        error: (res) => {
            console.log(res.responseJSON.message);
            generateMessages(
                "error",
                "Error al servidor",
                ".container-messages",
                3
            );
        },
    });
}

/**
 * @description "update tbody of admin HTML table"
 * @param {Element[]} cols
 */
function updateTableRowAdmin(cols) {
    $("tbody").html("");
    if (cols.length === 1) {
        if (
            $(".label-group input#password").val() &&
            $(".label-group input#password-confirmation").val()
        ) {
            const data = {
                user: $(".label-group input#user").val(),
                email: $(".label-group input#email").val(),
                firstname: $(".label-group input#name").val(),
                lastname1: $(".label-group input#surname").val(),
                lastname2: $(".label-group input#secondsurname").val(),
                password: $(".label-group input#password").val(),
            };
            insertRowInDB(data, "admins");
        }
    } else {
        const data = {
            user: $(".label-group input#user").val(),
            email: $(".label-group input#email").val(),
            firstname: $(".label-group input#name").val(),
            lastname1: $(".label-group input#surname").val(),
            lastname2: $(".label-group input#secondsurname").val(),
            password: $(".label-group input#password").val(),
        };
        updateRowInDB(data, "admins");
    }
}

/**
 * @description "update tbody of term HTML table"
 * @param {Element[]} cols
 */
function updateTableRowTerm(cols) {
    $("tbody").html("");
    if (cols.length === 1) {
        const data = {
            name: $(".label-group input#name").val(),
            desc: $(".label-group input#description").val(),
            start: momentFormat(
                $(".label-group input#start").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
            end: momentFormat(
                $(".label-group input#end").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
        };
        insertRowInDB(data, "terms");
    } else {
        const data = {
            id: $(cols[0]).text(),
            name: $(".label-group input#name").val(),
            desc: $(".label-group input#description").val(),
            start: momentFormat(
                $(".label-group input#start").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
            end: momentFormat(
                $(".label-group input#end").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
            type: null,
        };
        updateRowInDB(data, "terms");
    }
}

/**
 * @description "update tbody of career HTML table"
 * @param {Element[]} cols
 */
function updateTableRowCareers(cols) {
    $("tbody").html("");
    if (cols.length === 1) {
        const data = {
            term_id: getUrlParameter("term"),
            code: $(".label-group input#code").val(),
            name: $(".label-group input#name").val(),
            desc: $(".label-group input#description").val(),
            hours: $(".label-group input#hours").val(),
            start: momentFormat(
                $(".label-group input#start").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
            end: momentFormat(
                $(".label-group input#end").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
        };
        insertRowInDB(data, "careers");
    } else {
        const data = {
            id: $(cols[0]).text(),
            code: $(".label-group input#code").val(),
            name: $(".label-group input#name").val(),
            desc: $(".label-group input#description").val(),
            hours: $(".label-group input#hours").val(),
            start: momentFormat(
                $(".label-group input#start").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
            end: momentFormat(
                $(".label-group input#end").val(),
                "DD/MM/YYYY",
                "YYYY-MM-DD"
            ),
        };
        updateRowInDB(data, "careers");
    }
}

/**
 * @description "validate if edit or new term form have an errors"
 * @param {String} page "actual page"
 * @return {Boolean}
 */
function validationTermForm(page) {
    let msg = "";
    if (page != "admins") {
        if (isNull($(".label-group input#name").val()))
            msg += "El camp 'Nom' no pot estar buit.\n";
        if (isNull($(".label-group input#description").val()))
            msg += "El camp 'Descripció' no pot estar buit.\n";
        if (page === "careers") {
            if (isNull($(".label-group input#code").val()))
                msg += "El camp 'Codi' no pot estar buit.\n";
            if (isNull($(".label-group input#hours").val()))
                msg += "El camp 'Hores' no pot estar buit.\n";
        }
        if (isNull($(".label-group input#start").val()))
            msg += "El camp 'Data d'inici' no pot estar buit.\n";
        if (isNull($(".label-group input#end").val()))
            msg += "El camp 'Data de fi' no pot estar buit.\n";

        if (!msg) {
            let start = momentFormat(
                $(".label-group input#start").val(),
                "DD-MM-YYYY",
                "YYYYMMDD"
            );
            let end = momentFormat(
                $(".label-group input#end").val(),
                "DD-MM-YYYY",
                "YYYYMMDD"
            );
            if (start === "Invalid date")
                msg += "Data d'inici invàlida 'DD-MM-AAAA'.\n";
            else if (end === "Invalid date")
                msg += "Data de fi invàlida 'DD-MM-AAAA'.\n";
            else if (end < start)
                msg += "La data de fi no pot ser mes petita que la d'inici.\n";
        }
    }
    if (msg) {
        generateMessages("error", msg, ".container-messages", 5);
        return false;
    } else return true;
}

function selectedModule(selectedInputParent) {
    let groupOfSelectedInput = $(
        'input[group="' + $(selectedInputParent).attr("group") + '"]'
    );
    if ($(selectedInputParent).prop("checked") == true) {
        for (selectedInput of groupOfSelectedInput) {
            $(selectedInput).prop("checked", true);
        }

        if ($("input#module").length == $("input#module:checked").length) {
            $("input[type=checkbox]#allCourse").prop("checked", true);
        }
    } else if ($(selectedInputParent).prop("checked") == false) {
        for (selectedInput of groupOfSelectedInput) {
            $(selectedInput).prop("checked", false);
        }
        $("input[type=checkbox]#allCourse").prop("checked", false);
    }
}

function selectedUf(selectedInputParent) {
    let groupOfSelectedInput = $(
        'input#uf[group="' + $(selectedInputParent).attr("group") + '"]'
    );
    if ($(selectedInputParent).prop("checked") == false) {
        for (selectedInput of groupOfSelectedInput) {
            if ($(selectedInput).prop("checked") == false) {
                $(
                    'input#module[group="' +
                        $(selectedInputParent).attr("group") +
                        '"]'
                ).prop("checked", false);
                $("input[type=checkbox]#allCourse").prop("checked", false);
            }
        }
    }

    if ($(selectedInputParent).prop("checked") == true) {
        if (
            groupOfSelectedInput.length ==
            $(
                'input#uf[group="' +
                    $(selectedInputParent).attr("group") +
                    '"]:checked'
            ).length
        ) {
            $(
                'input#module[group="' +
                    $(selectedInputParent).attr("group") +
                    '"]'
            ).prop("checked", true);
        }

        if ($("input#module").length == $("input#module:checked").length) {
            $("input[type=checkbox]#allCourse").prop("checked", true);
        }
    }
}

function selectedAllCourse(selectedInputParent) {
    if ($(selectedInputParent).prop("checked") == true) {
        $(".container-form-user input[type=checkbox]").prop("checked", true);
    } else {
        $(".container-form-user input[type=checkbox]").prop("checked", false);
    }
}

function calculatePrice(requirementParameters) {
    $.getJSON("/data/prices.json", function (prices) {
        $(".container-form-user input[type=checkbox]:not(#allCourse)").attr(
            "disabled",
            "disabled"
        );

        $("#totalSelected").text(0);
        // Age of the User
        var age;

        if (requirementParameters["age"] < 28) {
            age = "less28";
        } else {
            age = "plus28";
        }

        // Calculating price for MIDDLE CAREER
        if ($("#codeCareer").text().includes("CFPM")) {
            $("input[type=checkbox]:not(#allCourse)").attr(
                "disabled",
                "disabled"
            );
            $("input[type=checkbox]#module").removeAttr("disabled");
            if ($("input#allCourse").prop("checked") == true) {
                $("#totalSelected").text(
                    prices["middle_career"]["all"][age]["base"] +
                        prices["middle_career"]["all"][age]["material"]
                );
            } else if ($("input#allCourse").prop("checked") == false) {
                $("#totalSelected").text(
                    prices["middle_career"]["modules"][age]["base"] +
                        $(
                            ".container-form-user input[type=checkbox]:checked:not(#allCourse)"
                        ).length *
                            prices["middle_career"]["modules"][age][
                                "permodule"
                            ] +
                        prices["middle_career"]["modules"][age]["material"]
                );
            }
        }
    });
}

/**
 * @description "JQuery DOM Ready: detect what is the current page of the user to load the functions"
 */
$(function () {
    if (
        location.pathname.endsWith("dashboard/terms/") ||
        location.pathname.endsWith("dashboard/terms")
    ) {
        $("tbody").fadeIn(300);
        loadTermPage();
        $("#start, #end").datepicker(dataPickerOptions);
        $("#start, #end").on("focus", () => {
            $(".ui-icon-circle-triangle-w")
                .parent()
                .html('<i class="fas fa-arrow-circle-left"></i>');
            $(".ui-icon-circle-triangle-e")
                .parent()
                .html('<i class="fas fa-arrow-circle-right"></i>');
        });
    } else if (location.pathname.includes("admin/dashboard/logs")) {
        loadLogsPage();
    } else if (location.pathname.includes("admin/dashboard/admins")) {
        loadAdminsPage();
    } else if (location.pathname.includes("dashboard/terms/delete/")) {
        $("#name").focus();
        const name = $("span.code").text();
        $("#name").on("input", (e) => {
            if (e.target.value === name) $("#remove").removeClass("disabled");
            else $("#remove").addClass("disabled");
        });
        $("#remove").on("click", (e) => {
            if ($("#remove").hasClass("disabled")) {
                generateMessages(
                    "info",
                    "Introdueix el nom del curs.",
                    ".container-messages",
                    2.5
                );
                $("#name").focus();
            } else {
                if ($("#name").val() === name) {
                    $("#remove").html("").addClass("loading");
                    const data = {
                        id: $(".delete-term").attr("data-id"),
                        type: "softDelete",
                    };
                    updateRowInDB(data, "terms");
                } else $("#remove").addClass("disabled");
            }
        });
    } else if (location.pathname.includes("admin/dashboard/logs")) {
        $("tbody").fadeIn(300);
        loadLogsPage();
    } else if (
        location.pathname.endsWith("/admin/dashboard/students/") ||
        location.pathname.endsWith("/admin/dashboard/students")
    ) {
        $("#file").change(function () {
            importCSV("students");
        });
        $("tbody").fadeIn(300);
        const page = getUrlParameter("page");
        if (page) {
            loadStudentsPage(
                $("meta[name='url']").attr("content") + `?page=${page}`
            );
        } else {
            loadStudentsPage();
        }
        $("#file-csv").on("change", (e) => {
            if (e.target.files[0].type === "text/csv") $("#form-file").submit();
            else
                generateMessages(
                    "error",
                    "Els arxius han de ser .CSV",
                    ".container-messages",
                    2.5
                );
        });
    } else if (
        location.pathname.endsWith("/dashboard/documents") ||
        location.pathname.endsWith("/dashboard/documents/")
    ) {
        if (getUrlParameter("status")) {
            generateMessages(
                getUrlParameter("status"),
                getUrlParameter("text"),
                ".container-messages",
                5
            );
        }
        $('input[type="file"]').change(function (e) {
            doc_name = e.target.id;
            importIMG(doc_name);
        });
        $("button.filter").on("click", filterStudentsPage);
    } else if (
        location.pathname.endsWith("/admin/dashboard/careers/") ||
        location.pathname.endsWith("/admin/dashboard/careers")
    ) {
        loadCareerPage();
        $("#start, #end").datepicker(dataPickerOptions);
        $("#start, #end").on("focus", () => {
            $(".ui-icon-circle-triangle-w")
                .parent()
                .html('<i class="fas fa-arrow-circle-left"></i>');
            $(".ui-icon-circle-triangle-e")
                .parent()
                .html('<i class="fas fa-arrow-circle-right"></i>');
        });
        $("#file-csv").on("change", (e) => {
            if (e.target.files[0].name.split(".").pop() === "csv") {
                importCSV("careers");
            } else {
                generateMessages(
                    "error",
                    "Els arxius han de ser .CSV",
                    ".container-messages",
                    2.5
                );
                $(e.target).trigger("reset");
            }
        });
    } else if (
        location.pathname.endsWith("/admin/dashboard/careers/import") ||
        location.pathname.endsWith("/admin/dashboard/careers/import/")
    ) {
        const careers = JSON.parse(localStorage.getItem("careers_json"));
        if (!careers) {
            generateMessages(
                "warning",
                "No s'ha trobat cap importació.",
                ".container-messages",
                2.5
            );
            setTimeout(
                () => (location.href = "/admin/dashboard/careers"),
                2500
            );
        } else {
            loadImportPage(careers);
        }
    } else if (location.pathname.includes("admin/dashboard/careers/delete/")) {
        $(".buttons-group>a.btn.save").prop(
            "href",
            "/admin/dashboard/careers?term=" + getUrlParameter("term")
        );
        $("#name").focus();
        const name = $("span.code").text();
        $("#name").on("input", (e) => {
            if (e.target.value === name) $("#remove").removeClass("disabled");
            else $("#remove").addClass("disabled");
        });
        $("#remove").on("click", (e) => {
            if ($("#remove").hasClass("disabled")) {
                generateMessages(
                    "info",
                    "Introdueix el nom del cicle.",
                    ".container-messages",
                    2.5
                );
                $("#name").focus();
            } else {
                if ($("#name").val() === name) {
                    $("#remove").html("").addClass("loading");
                    const data = {
                        id: $(".delete-term").attr("data-id"),
                        type: "softDelete",
                    };
                    updateRowInDB(data, "careers");
                } else $("#remove").addClass("disabled");
            }
        });
    } else if (
        location.pathname.endsWith("/admin/dashboard/students/matriculation") ||
        location.pathname.endsWith("/admin/dashboard/students/matriculation/")
    ) {
        loadAdminMatriculationPage();
    } else if (
        location.pathname.endsWith("/admin/dashboard/profileReq") ||
        location.pathname.endsWith("/admin/dashboard/profileReq/")
    ) {
        loadProfileReqPage();
    } else if (location.pathname.includes("/admin/dashboard")) {
        if (getUrlParameter("status")) {
            generateMessages(
                getUrlParameter("status"),
                getUrlParameter("text"),
                ".container-messages",
                5
            );
        }
    }

    //"DARK-MODE"
    $(".dark-mode").on("change", () => {
        const prefersDarkScheme = window.matchMedia(
            "(prefers-color-scheme: dark)"
        );
        if (!prefersDarkScheme.matches) {
            $("body").toggleClass("night");
            $(".dark-mode").toggleClass("active");

            if ($("body").hasClass("night")) {
                //cuando el cuerpo tiene la clase 'dark' actualmente
                localStorage.setItem("darkMode", "enabled"); //almacenar estos datos si el modo oscuro está activado
            } else {
                localStorage.setItem("darkMode", "disabled"); //almacenar estos datos si el modo oscuro está desactivado
            }
        }
    });

    if (localStorage.getItem("darkMode") == "enabled") {
        $(".dark-mode").toggleClass("active").prop("checked", true);
    }

    const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
    if (prefersDarkScheme.matches) {
        if (!$("body").hasClass("night")) {
            $("body").addClass("night");
        }
    }
    $("");
});
