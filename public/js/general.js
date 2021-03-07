/* FUNCTIONS */
function isNull(name) {
    return document.getElementsByName(name)[0].value.replace(/ /g, "");
}

/* GENERATE MESSAGES */
function generateMessages(type, text, parentName, seconds) {
    const icons = {
        success: "far fa-check-circle",
        error: "far fa-times-circle",
        warning: "fas fa-exclamation-triangle",
        info: "fas fa-info-circle"
    }
    $(parentName).prepend(`<div class="message msg-${type}"><i class="${icons[type]}"></i> ${text}</div>`);
    setTimeout(() => {
        $(parentName + " .message:nth-child(1)").fadeIn();
    }, 1);
    countdown(parentName, seconds);
}

function countdown(parentName, seconds) {
    setTimeout(() => {
        $(parentName + " .message").last().fadeOut(400, () => $(parentName + " .message").last().remove());
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
                    moment(item.start, "YYYY-MM-DD").format("DD-MM-YYYY"),
                    moment(item.end, "YYYY-MM-DD").format("DD-MM-YYYY"),
                    moment(item.created_at, "YYYY-MM-DD hh:mm:ss").format("DD/MM/YYYY HH:mm:ss"),
                    moment(item.updated_at, "YYYY-MM-DD hh:mm:ss").format("DD/MM/YYYY HH:mm:ss")
                ));
            }
            $("tbody").append(
                `<tr>
                    <td colspan="9"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegir un nou curs</button></td>
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
            "Desar": () => {
                dialog.dialog("close");
                updateTableRowTerm(rowSelected.children());
                $(".bg-dialog").removeClass("bg-opacity");
            },
            "Cancela": () => {
                dialog.dialog("close");
                $(".bg-dialog").removeClass("bg-opacity");
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
    $(childrens[0]).attr("class", "btn save").text((tag.id === "new") ? 'Crear' : 'Desar').after('<div class="or"></div>');
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
                <td><button id="edit" class="btn save" title="Modificar el curs"><i class="fas fa-pen"></i></button></td>
                <td><button id="remove" class="btn cancel" title="Eliminar el curs"><i class="fas fa-trash"></i></button></td>
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
            moment($(".label-group input#start").val(), "DD/MM/YYYY").format("YYYY-MM-DD"),
            moment($(".label-group input#end").val(), "DD/MM/YYYY").format("YYYY-MM-DD"),
            moment().format("DD/MM/YYYY HH:mm:ss"),
            moment().format("DD/MM/YYYY HH:mm:ss")
        );
        loadTermPage();
    } else {
        $("tbody").html('');
        updateTermInDB(
            $(cols[0]).text(),
            $(".label-group input#name").val(),
            $(".label-group input#description").val(),
            moment($(".label-group input#start").val(), "DD/MM/YYYY").format("YYYY-MM-DD"),
            moment($(".label-group input#end").val(), "DD/MM/YYYY").format("YYYY-MM-DD"),
            moment().format("DD/MM/YYYY HH:mm:ss"),
            moment().format("DD/MM/YYYY HH:mm:ss")
        );
        loadTermPage();
    }
}

$(function () {
    if (location.pathname.includes("dashboard/cursos")) {
        loadTermPage();
        $("#start, #end").datepicker(dataPickerOptions);
        $("#start, #end").on("focus", () => {
            $(".ui-icon-circle-triangle-w").parent().html('<i class="fas fa-arrow-circle-left"></i>')
            $(".ui-icon-circle-triangle-e").parent().html('<i class="fas fa-arrow-circle-right"></i>')
        })
    }
});
