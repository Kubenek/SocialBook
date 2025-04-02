document.querySelectorAll('.dropdown-button').forEach(function(button) {
    button.addEventListener('click', function() {

        var dropdownContent = button.nextElementSibling;

        dropdownContent.classList.toggle('show');
        button.classList.toggle('active')
    });
});

document.querySelectorAll('.dropdown-button-in').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent closing parent dropdown
        
        let dropdownContent = button.nextElementSibling;
        dropdownContent.classList.toggle('show');
        button.classList.toggle('active');
    });
});
