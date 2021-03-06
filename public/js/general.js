function getAllTerms() {
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
                            <td><button class="btn save"><i class="fas fa-pen"></i></button></td>
                            <td><button class="btn cancel"><i class="fas fa-trash"></i></button></td>
                        </tr>`
                );
            }
            $("tbody").append(
                `<tr>
                    <td colspan="9"><button class="btn secondary-btn">Afegir un nou curs</button></td>
                </tr>`
            ).fadeIn(300);
        }
    });
}

$(function () {
    if (location.pathname.includes("dashboard/cursos")) getAllTerms();
});
