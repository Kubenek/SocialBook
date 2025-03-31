document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form")

    const errorContainer = document.createElement('div')

    document.body.appendChild(errorContainer);
 
    form.addEventListener("submit", (e) => {
        e.preventDefault()

        const formData = new FormData(form)

        fetch("scripts/php/accrHandler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.error) {

                const html = `
                    <div class="modal" id="errorModal">
                        <div class="modal-content">

                            <h1 id="modalTitle">Error</h1>

                            <p class="modalText">${data.error}</p>

                            <button class="closeModal">Okay</button>

                        </div>
                    </div>
                `

                errorContainer.innerHTML = html

                document.getElementById("errorModal").style.display = "flex";

                document.querySelector(".closeModal").addEventListener("click", () => {
                    document.getElementById("errorModal").style.display = "none";
                });

            } else if (data.success) {
                window.location.href = "feed.php"
            }
        })
        .catch(error => console.error("Error: " + error))
    })

})