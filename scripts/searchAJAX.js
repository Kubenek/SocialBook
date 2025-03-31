document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("searchForm")
    const resultContainer = document.querySelector(".resultList"); 

    form.addEventListener("submit", (e) => {
        e.preventDefault(); 

        const formData = new FormData(form);

        fetch("scripts/php/searchHandler.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            resultContainer.innerHTML = "";

            if (data.response && Array.isArray(data.response) && data.response.length > 0) {
                data.response.forEach(user => {

                    if(user.bio === "") {
                        user.bio = "No information"
                    }

                    const userItem = document.createElement("div");
                    userItem.classList.add("user-item"); 
                    userItem.innerHTML = `<div class="userInfo">
                                            <img width="30px" height="30px" src="images/gen/user.png">
                                            <h3>${user.login}</h3>
                                            <button class="followButton">Follow</button>
                                          </div>
                                          <p>${user.bio}</p>` 
                    resultContainer.appendChild(userItem);
                });
            } else {
                resultContainer.innerHTML = "<p>No users found.</p>";
            }
        })
        .catch(error => console.error("Error: " + error));
    });
});
