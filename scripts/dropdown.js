document.querySelectorAll('.dropdown-button').forEach(function(button) {
    button.addEventListener('click', function() {
        // Find the next sibling (the .dropdown-content) of the clicked button
        var dropdownContent = button.nextElementSibling;
        dropdownContent.classList.toggle('show');
    });
});
