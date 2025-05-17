<?php

if (
    isset($_SESSION['dark_status']) &&
    $_SESSION['dark_status'] == 1 &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            const body = document.querySelector("body");
            const modeText = body.querySelector(".mode-text");

            body.classList.add("dark");
            if (modeText) {
                modeText.innerText = "Light mode";
            }
        });
    </script>';
} elseif (!isset($_SESSION['dark_status'])) {
    $_SESSION['dark_status'] = 0;
}