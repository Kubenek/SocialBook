<?php

require_once __DIR__ . "/init.php";

if (
    isset($_SESSION['dark_status']) &&
    $_SESSION['dark_status'] == 1 &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
    echo '<script>
        document.documentElement.classList.add("dark");
    </script>';
} elseif (!isset($_SESSION['dark_status'])) {
    $_SESSION['dark_status'] = 0;
}
