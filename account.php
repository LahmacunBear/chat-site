<?php
    $a = $_POST['user'];
    $b = $_POST['pass'];
    $command = 'python ' . getcwd() . '\\' . 'account.py ';
    $command = $command . '"' . $a . '" ' . '"' . $b . '"';
    $content = shell_exec($command);
    if (substr($content, 0, 1) == '/') {
        header('Location: ' . $content);
    }
    else {
        $content = explode('###', $content);
        $x = $content[0];
        $y = $content[1];
        setcookie('x', $x, time() + 3600);
        setcookie('y', $y, time() + 3600);
        header('Location: /media.php');
    }
?>