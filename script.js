document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const responseMessageDiv = document.getElementById("responseMessage");

    form.addEventListener("submit", function(e) {
        e.preventDefault(); // This prevents the form from being submitted the default way

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "submit.php", true);

        xhr.onload = function() {
            if (this.status == 200) {
                // Assuming a 200 status indicates a successful response:
                responseMessageDiv.innerText = this.responseText;
                responseMessageDiv.style.backgroundColor = "lightgreen";  // Green color for success
                responseMessageDiv.style.color = "green";
            } else {
                responseMessageDiv.innerText = "Error: " + this.statusText;
                responseMessageDiv.style.backgroundColor = "lightcoral";  // Red color for error
                responseMessageDiv.style.color = "red";
            }
        };

        xhr.onerror = function() {
            responseMessageDiv.innerText = "Request error...";
            responseMessageDiv.style.backgroundColor = "lightcoral";  // Red color for error
            responseMessageDiv.style.color = "red";
        };

        xhr.send(formData);
    });
});
