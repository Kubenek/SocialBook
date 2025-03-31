document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form")
    const errorContainer = document.createElement("div")
    errorContainer.classList.add("modal")
    form.appendChild(errorContainer)

    form.addEventListener("submit", (e) => {
        e.preventDefault()

        const formData = new FormData(form)

        fetch("scripts/php/login_handler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.error) {
                errorContainer.textContent = data.error;
            } else if (data.success) {
                window.location.href = "feed.php"
            }
        })
        .catch(error => console.error("Error: " + error))
    })

})