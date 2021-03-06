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
        success: function (res) {
            for (const item of res) {
                $("tbody").append(
                    `<tr ${(!item.active) ? 'class="disabled"': ''}>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.description}</td>
                            <td>${item.start}</td>
                            <td>${item.end}</td>
                            <td>${moment(item.created_at, "YYYY-MM-DD hh:mm:ss").format("DD/MM/YYYY hh:mm:ss")}</td>
                            <td>${moment(item.updated_at, "YYYY-MM-DD hh:mm:ss").format("DD/MM/YYYY hh:mm:ss")}</td>
                            <td><button id="edit" class="btn save" title="Modificar el curs"><i class="fas fa-pen"></i></button></td>
                            <td><button id="remove" class="btn cancel" title="Eliminar el curs"><i class="fas fa-trash"></i></button></td>
                        </tr>`
                );
            }
            $("tbody").append(
                `<tr>
                    <td colspan="9"><button type="button" id="new" class="btn secondary-btn"><i class="far fa-calendar-plus"></i> Afegir un nou curs</button></td>
                </tr>`
            ).fadeIn(300);

            $("body").addClass("body-term");
            $("#new, #edit").on("click", () => {
                $(".bg-dialog").addClass("bg-opacity");
                let dialog = $(".modal-term").dialog({
                    modal: true,
                    buttons: {
                        "Guardar": () => {

                        },
                        "Cancela": () => {
                            dialog.dialog("close");
                            $(".bg-dialog").removeClass("bg-opacity");
                        }
                    },
                    close: function () {
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
                $(childrens[0]).attr("class", "btn save").after('<div class="or"></div>');
                $(".ui-dialog-titlebar-close").html('<i class="fas fa-times-circle"></i>');
            });
        }
    });
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
