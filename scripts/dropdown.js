document.querySelectorAll('.dropdown-button').forEach(function(button) {
    button.addEventListener('click', function() {

        var dropdownContent = button.nextElementSibling;

        dropdownContent.classList.toggle('show');
        button.classList.toggle('active')
    });
});
