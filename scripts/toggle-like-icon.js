document.addEventListener("DOMContentLoaded", () => {
    var elements = document.getElementsByClassName("hicon");

    Array.from(elements).forEach(function(button) {

        button.addEventListener("click", function() {

            var element = button.querySelector("i");

            if (element.classList.contains("bxs-heart")) {
                element.classList.add('bx-heart');
                element.classList.remove('bxs-heart');
            } else {
                element.classList.remove('bx-heart');
                element.classList.add('bxs-heart');
            }
        })
    });
});