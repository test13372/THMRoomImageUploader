document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const responseMessageDiv = document.getElementById("responseMessage");
    const htmlMessageDiv = document.getElementById("htmlMessage");
    const markdownMessageDiv = document.getElementById("markdownMessage");
    const copyButton = document.getElementById("copyButton");
    const copyButton2 = document.getElementById("copyButton2");
    const altTextInput = document.getElementById("altText");

    form.addEventListener("submit", function(e) {
        e.preventDefault(); 

        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "submit.php", true);

        xhr.onload = function() {
            if (this.status == 200) {
                const altText = altTextInput.value;

                responseMessageDiv.innerText = this.responseText;
                responseMessageDiv.style.backgroundColor = "lightgreen";  
                responseMessageDiv.style.color = "green";

                htmlMessageDiv.innerText = '<img src="' + this.responseText + '" alt="' + altText + '">';
                htmlMessageDiv.style.backgroundColor = "lightgreen";  
                htmlMessageDiv.style.color = "green";

                markdownMessageDiv.innerText = '![](' + this.responseText + ' "' + altText + '")';
                markdownMessageDiv.style.backgroundColor = "lightgreen";  
                markdownMessageDiv.style.color = "green";

            } else {
                responseMessageDiv.innerText = "Error: " + this.statusText;
                responseMessageDiv.style.backgroundColor = "lightcoral";  
                responseMessageDiv.style.color = "red";
            }
        };

        xhr.onerror = function() {
            responseMessageDiv.innerText = "Request error...";
            responseMessageDiv.style.backgroundColor = "lightcoral";  
            responseMessageDiv.style.color = "red";
        };

        xhr.send(formData);
    });

    // Copy HTML to clipboard function
    copyButton.addEventListener("click", function() {
        copyToClipboard(htmlMessageDiv.innerText);
    });

    // Copy Markdown to clipboard function
    copyButton2.addEventListener("click", function() {
        copyToClipboard(markdownMessageDiv.innerText);
    });
    
    function copyToClipboard(text) {
        const tempTextarea = document.createElement("textarea");
        tempTextarea.value = text;
        document.body.appendChild(tempTextarea);
        tempTextarea.select();
        document.execCommand("copy");
        document.body.removeChild(tempTextarea);
        
        alert("Content copied to clipboard!");
    }
});
