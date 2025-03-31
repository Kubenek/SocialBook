document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("searchForm")
    const resultContainer = document.querySelector(".resultList"); 

    form.addEventListener("submit", (e) => {
        e.preventDefault(); 

        const formData = new FormData(form);
        console.log([...formData]);

        fetch("scripts/php/searchHandler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            resultContainer.innerHTML = "";

            if (data.response && Array.isArray(data.response) && data.response.length > 0) {
                data.response.forEach(user => {
                    const userItem = document.createElement("div");
                    userItem.classList.add("user-item"); 
                    userItem.textContent = user.login; 
                    resultContainer.appendChild(userItem);
                });
            } else {
                resultContainer.innerHTML = "<p>No users found.</p>";
            }
        })
        .catch(error => console.error("Error: " + error));
    });
});
