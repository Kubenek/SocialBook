document.addEventListener('DOMContentLoaded', () => {
    setInterval(() => {
        fetch('scripts/php/session_check.php')
        .then(res => res.json())
        .then(data => {
            if(!data.valid) {
                window.location.href = "login.php";
            }
        })
        .catch(() => {
            console.log("There has been an error, see the network tab for more info!")
        })
    }, 60000)
})