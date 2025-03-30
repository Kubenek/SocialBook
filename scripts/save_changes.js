function saveChanges() {
    // Get form data
    const username = document.getElementById('usernameInput').value;
    const bio = document.getElementById('bioInput').value;

    // Create an object to hold the form data
    const data = {
        username: username,
        bio: bio
    };

    fetch('scripts/php/save_changes.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data) // Send data as JSON
    })
    .then(response => response.json())
    .then(data => {
        console.log("debug!")
        if (data.success) {
            alert('Changes saved successfully!');
        } else {
            alert('There was an error saving your changes.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred.');
    });
}
