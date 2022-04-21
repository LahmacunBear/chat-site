<?php
    if (isset($_GET['z'])) {
        if ($_GET['z'] != "") {
            setcookie('z', $_GET['z'], time() + 86400);
    
            if (!file_exists($_GET['z'] . '.txt')) {
                $messagefile = fopen($_GET['z'] . '.txt', 'w');
                fwrite($messagefile, "Welcome to the room!<br>\n");
                fclose($messagefile);
            }
        }

        header('Location: /media.php');
    }
?>

<!DOCTYPE html>

<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1" /> 

        <title>Main</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    
        <style>
        
        body {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
        }

        .inputbar {
            border: 0px;
            border-bottom: 1px solid black;
            background-color: transparent;
            transition: 0.5s;
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
        }

        .inputbar:hover {
            background-color: #bacaff;
            color: #00195c;
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
        }

        .inputbar:focus {
            outline: none;
        }

        .submit {
            border: 0px;
            background-color: #bacaff;
            color: #00195c;
            transition: 0.5s;
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
        }

        .submit:hover {
            background-color: #110091;
            color: #d6e2ff;
        }

        </style>
    
    </head>

<body>

    <?php 
        $content = '<form method="get" action="media.php" spellcheck="false" autocomplete="off">';
        $content .= 'Room: <input type="text" name="z" class="inputbar" pattern="[a-zA-Z]*" value="';
        if (isset($_COOKIE['z'])) {$content .= $_COOKIE['z'];}
        $content .= '"> <input type="submit" value="Change" class="submit">';
        $content .= '</form>';
        echo $content
    ?>
    

    <hr style="opacity:0;">

    <form method="get" action="message.php" spellcheck="false" autocomplete="off">
        You: <input type="text" name="message" class="inputbar"> <input type="submit" value="Go" class="submit">
    </form>
    
    <hr style="opacity:0;">

    <div id="messages">
        <?php
            if (isset($_COOKIE['x'])) {
                $command = 'python ' . getcwd() . '/' . 'verify.py ';
                $command = $command . '"' . $_COOKIE['x'] . '" ' . '"' . $_COOKIE['y'] . '"';
                $content = shell_exec($command);

                if ($content == 'Unverified') {
                    header('Location: /index.php?error=Session%20Timeout');
                }
            }

            echo "<br>";

            if (isset($_COOKIE['z'])) {
                $messagefile = file($_COOKIE['z'] . '.txt');
                $messagefile = array_reverse($messagefile);

                foreach($messagefile as $line){
                    echo $line . "";
                }
            }
            else {
                echo "No room chosen";
            }

        ?>
    </div>

    <script>

        const z = document.cookie.split('; ').find(row => row.startsWith('z=')).split('=')[1];

        function loadFile(filePath) {
            var result = null;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", filePath, false);
            xmlhttp.send();
            if (xmlhttp.status==200) {
                result = xmlhttp.responseText;
            }
            return result;
        }

        function updatetext() {
            document.getElementById("messages").innerHTML = loadFile(z + '.txt');
            document.getElementById("messages").innerHTML = document.getElementById("messages").innerHTML.split("<br>\n").reverse().join("<br>\n");

        }

        setInterval(updatetext, 500);

    </script>

</body>

</html>