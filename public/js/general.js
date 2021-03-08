/* FUNCTIONS */
function isNull(element) {
    return (element.replace(/ /g, "")) ? false : true;
}

function momentFormat(value, valFormat, newFormat) {
    return moment(value, valFormat).format(newFormat);
}

function now() {
    return moment().format("DD/MM/YYYY HH:mm:ss");
}

/* GENERATE MESSAGES */
let cont = 1;

function generateMessages(type, text, parentName, seconds) {
    const icons = {
        success: "far fa-check-circle",
        error: "far fa-times-circle",
        warning: "fas fa-exclamation-triangle",
        info: "fas fa-info-circle"
    }
    $(parentName).prepend(`<div id="${cont}" class="message msg-${type}"><i class="${icons[type]}"></i> ${text}</div>`);
    setTimeout(() => {
        $(parentName + " .message:nth-child(1)").fadeIn();
        countdown(parentName, cont, seconds);
        cont++;
    }, 1);
}

function countdown(parentName, id, seconds) {
    setTimeout(() => {
        $(parentName + " .message#" + id).fadeOut(400, () => $(parentName + " .message").last().remove());
    }, seconds * 1000);
}

/* TERMS */
const dataPickerOptions = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
}

function loadTermPage() {
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: 'GET',
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        success: (res) => {
            for (const item of res) {
                $("tbody").append(insertNewRow(
                    item.id, item.name, item.description,
                    momentFormat(item.start, "YYYY-MM-DD", "DD-MM-YYYY"),
                    momentFormat(item.end, "YYYY-MM-DD", "DD-MM-YYYY"),
                    momentFormat(item.created_at, "YYYY-DD-MM hh:mm:ss", "DD/MM/YYYY HH:mm:ss"),
                    momentFormat(item.updated_at, "YYYY-DD-MM hh:mm:ss", "DD/MM/YYYY HH:mm:ss")
                ));
            }
            $("tbody").append(
                `<tr>
                    <td colspan="9"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegeix un nou curs</button></td>
                </tr>`
            ).fadeIn(300);

            $("body").addClass("body-term");
            $("#new, #edit").on("click", (e) => rowEventEditAndNew(e.target));
        }
    });
}

function rowEventEditAndNew(tag) {
    $(".bg-dialog").addClass("bg-opacity");
    const rowSelected = $(tag).closest("tr");
    let dialog = $(".modal-term").dialog({
        modal: true,
        buttons: {
            "Desa": () => {
                if (validationTermForm()) {
                    dialog.dialog("close");
                    updateTableRowTerm(rowSelected.children());
                    $(".bg-dialog").removeClass("bg-opacity");
                }
            },
            "Cancela": () => {
                dialog.dialog("close");
                setTimeout(() => $(".bg-dialog").removeClass("bg-opacity"), 700);
            }
        },
        close: () => {
            $(".bg-dialog").removeClass("bg-opacity");
        },
        show: {
            effect: "fold",
            duration: 700
        },
        hide: {
            effect: "fold",
            duration: 700
        }
    });
    let childrens = $(".ui-dialog-buttonset").addClass("buttons-group").children();
    $(childrens[1]).attr("class", "btn cancel");
    $(childrens[0]).attr("class", "btn save").text((tag.id === "new") ? 'Crea' : 'Desa').after('<div class="or"></div>');
    $(".ui-dialog-title").text((tag.id === "new") ? 'Nou Curs' : 'Modicació de curs');
    $(".ui-dialog-titlebar-close").html('<i class="fas fa-times-circle"></i>');
    getInfoForTermModal(rowSelected.children());
}

function insertNewRow(...params) {
    return `<tr>
                <td>${params[0]}</td>
                <td>${params[1]}</td>
                <td>${(params[2]) ? params[2] : ''}</td>
                <td>${params[3]}</td>
                <td>${params[4]}</td>
                <td>${params[5]}</td>
                <td>${params[6]}</td>
                <td><button id="edit" class="btn save" title="Modifica el curs"><i class="fas fa-pen"></i></button></td>
                <td><button id="remove" class="btn cancel" title="Elimina el curs"><i class="fas fa-trash"></i></button></td>
            </tr>`;
}

function getInfoForTermModal(cols) {
    $(".label-group input#name").val($(cols[1]).text()); // NAME
    $(".label-group input#description").val($(cols[2]).text()); // DESCRIPTION
    $(".label-group input#start").val($(cols[3]).text()); // START
    $(".label-group input#end").val($(cols[4]).text()); // END
}

function insertTermInDB(name, desc, start, end, created, updated) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $("meta[name='url']").attr("content"),
        method: 'POST',
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data: {
            name,
            desc,
            start,
            end,
            created,
            updated
        },
        success: (res) => generateMessages("success", res.status, ".container-messages", 3),
        error: (res) => generateMessages("error", res.responseJSON.message, ".container-messages", 3)
    });
}

function updateTermInDB(id, name, desc, start, end, created, updated) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $("meta[name='url']").attr("content") + "/" + id,
        method: 'PUT',
        headers: {
            token: $("meta[name='_token']").attr("content"),
        },
        data: {
            name,
            desc,
            start,
            end,
            created,
            updated
        },
        success: (res) => generateMessages("success", res.status, ".container-messages", 3),
        error: (res) => generateMessages("error", res.responseJSON.message, ".container-messages", 3)
    });
}

function updateTableRowTerm(cols) {
    if (cols.length === 1) {
        $("tbody").html('');
        insertTermInDB(
            $(".label-group input#name").val(),
            $(".label-group input#description").val(),
            momentFormat($(".label-group input#start").val(), "DD/MM/YYYY", "YYYY-MM-DD"),
            momentFormat($(".label-group input#end").val(), "DD/MM/YYYY", "YYYY-MM-DD"),
            now(), now()
        );
        loadTermPage();
    } else {
        $("tbody").html('');
        updateTermInDB(
            $(cols[0]).text(),
            $(".label-group input#name").val(),
            $(".label-group input#description").val(),
            momentFormat($(".label-group input#start").val(), "DD/MM/YYYY", "YYYY-MM-DD"),
            momentFormat($(".label-group input#end").val(), "DD/MM/YYYY", "YYYY-MM-DD"),
            now(), now()
        );
        loadTermPage();
    }
}

function validationTermForm() {
    let msg = "";
    if (isNull($(".label-group input#name").val())) msg += "El camp 'Nom' no pot estar buit.\n";
    if (isNull($(".label-group input#description").val())) msg += "El camp 'Descripció' no pot estar buit.\n";
    if (isNull($(".label-group input#start").val())) msg += "El camp 'Data d'inici' no pot estar buit.\n";
    if (isNull($(".label-group input#end").val())) msg += "El camp 'Data de finalització' no pot estar buit.\n";

    if (!msg) {
        let start = momentFormat($(".label-group input#start").val(), "DD-MM-YYYY", "YYYYMMDD");
        let end = momentFormat($(".label-group input#end").val(), "DD-MM-YYYY", "YYYYMMDD");
        if (start === "Invalid date")
            msg += "Data d'inici invalida 'DD-MM-AAAA'.\n";
        else if (end === "Invalid date")
            msg += "Data de finalització invalida 'DD-MM-AAAA'.\n";
        else if (end < start)
            msg += "La data de finalització no pot ser mes petita que la d'inici.\n";
    }

    if (msg) {
        generateMessages("error", msg, ".container-messages", 5);
        return false;
    } else return true;
}

$(function () {
    if (location.pathname.includes("dashboard/terms")) {
        loadTermPage();
        $("#start, #end").datepicker(dataPickerOptions);
        $("#start, #end").on("focus", () => {
            $(".ui-icon-circle-triangle-w").parent().html('<i class="fas fa-arrow-circle-left"></i>')
            $(".ui-icon-circle-triangle-e").parent().html('<i class="fas fa-arrow-circle-right"></i>')
        })
    }
});
