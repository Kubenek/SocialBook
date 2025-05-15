const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

var currentStatus = 0;

modeSwitch.addEventListener("click" , () =>{

    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){

        currentStatus = 1;
        
        modeText.innerText = "Light mode";

        fetch("scripts/php/update_dark.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ dark_status: currentStatus })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server responded:', data);
        })
        .catch(error => {
            console.error('Error updating session:', error);
        });

    }else{
        
        currentStatus = 0;

        modeText.innerText = "Dark mode";

        fetch("scripts/php/update_dark.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ dark_status: currentStatus })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server responded:', data);
        })
        .catch(error => {
            console.error('Error updating session:', error);
        });

    }
});