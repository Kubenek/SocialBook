document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("readForm")

    form.addEventListener("submit", (e) => {
        e.preventDefault(); 

        const formData = new FormData(form);

        fetch("scripts/php/readHandler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                let elements = document.querySelectorAll(".unread")
                elements.forEach((element) => {
                    element.classList.remove("unread")
                })
            } else {
                console.log(data.error)
            }
        })
        .catch(error => console.error("Error: " + error));
    });
});
