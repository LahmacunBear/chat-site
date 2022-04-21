<?php
    if (!isset($_COOKIE['z'])) {
        header('Location: /media.php');
    }
    if (!isset($_COOKIE['x'])) {
        header('Location: /index.php?error=A%20Problem%20Occurred');
    }
    if ($_COOKIE['z'] == '') {
        header('Location: /index.php?error=Room%20Timeout');
    }
    $messagefile = fopen($_COOKIE['z'] . '.txt', 'a');
    fwrite($messagefile, $_COOKIE['x'] . ': ' . $_GET['message'] . "<br>\n");
    fclose($messagefile);
    header('Location: /media.php');
?>