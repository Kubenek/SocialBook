function saveChanges() {
    const username = document.getElementById('usernameInput').value;
    const bio = document.getElementById('bioInput').value;

    const data = {
        username: username,
        bio: bio
    };

    fetch('scripts/php/save_changes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) 
    })
    .then(response => response.json())
    .then(data => {
        console.log("debug!")
        if (data.success) {
            alert('Changes saved successfully!');
        } else {
            alert('There was an error saving your changes. ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}
