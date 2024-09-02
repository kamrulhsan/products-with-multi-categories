const alert = document.getElementById('error');
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json, text-plain, */*",
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": token
};

async function sendRequest(url = '', requestMethod = 'GET', data = {}) {
    const response = await fetch(url, {
        method: requestMethod,
        headers: headers,
        body: JSON.stringify(data)
    }).catch(function(error){
        // Display "error.message" to the user...
        const errorMessage = document.createTextNode('')
        errorMessage.nodeValue = error.message;
        alert.appendChild(errorMessage);
        alert.classList.remove('d-none');
    });

    return response.json();
}

function unsubscribe(event){
    const subscriptionURL = window.location.origin + '/payment/unsubscribe';
    const requestData = { };
    sendRequest(subscriptionURL, 'POST', requestData).then(data => {
        setTimeout(function() {
            window.location.reload();
        }, 1000);
    });
}
