EventTarget.prototype.on = EventTarget.prototype.addEventListener;
async function ajaxCall(url, verb, data) {
    let response = await fetch(url, {
        method: verb,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    });
    response = await response.json();
    return response;
}

function ajaxPOST2(url, data = { action: "testing" }) {
    $.post(url, {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        body: data,
        contentType: "application/json",
        dataType: "json",
    }).then(function (response) {
        console.log(`This is the response from the endpoint: ${response}`);
        console.log("ajaxPOST2 has finished");
    });
}

function filterMatriculacions(e) {
	let data = {};
	let formElements = document.querySelectorAll('input');
	for (const elem of formElements) {
		data[elem.name] = elem.value
	}
	console.log(data)
	let response = ajaxCall('./', 'GET', data);
}

document
    .querySelector('button[name="filter"]')
    .on("click", filterMatriculacions);

window.onload = ajaxCall('api/careers', 'GET')