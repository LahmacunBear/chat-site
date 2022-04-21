<!DOCTYPE html>

<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1" /> 

        <title>Welcome</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    
        <style>
        
        body {
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            font-size: 40px;
        }

        .welcome {
            margin: auto;
            border: 2px solid #5a6d7c;
            width: 450px;
            text-align: center;
            border-radius: 10px;
            height: 600px;
            transition: 0.5s;
            font-size: 24px;
        }

        .welcome:hover {
            background-color: #ecf3fa ;
            color: #00195c; 
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

        .error {
            margin: auto;
            border: 2px solid #ff1200;
            width: 450px;
            text-align: center;
            border-radius: 10px;
            height: 50px;
            transition: 0.5s;
            font-size: 24px;
            background-color: #ffbfba ;
            color: #ff1200;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        </style>
    
    </head>

<body>

    <?php
        if (isset($_GET['error'])) {
            echo '<hr style="opacity: 0;height: 25px;">';
            echo '<div class="error">' . $_GET['error'] . '</div>';
            echo '<hr style="opacity: 0;height: 25px;">';
        }
        else {
            echo '<hr style="opacity: 0;height: 100px;">';
        }
    ?>
    
    <div class="welcome">
        <h1>Welcome</h1>

        Please use only letters, numbers and underscores in your username.

        <hr style="opacity: 0">

        <form method="post" action="account.php" spellcheck="false" autocomplete="off">
            Username: <input type="text" name="user" class="inputbar" pattern="[a-zA-Z0-9_]*">
            <hr style="opacity: 0">
            Password: <input type="text" name="pass" class="inputbar">
            <hr style="opacity: 0;height: 100px;">
            <input type="submit" value="Begin" class="inputbar">
        </form>
    </div>

</body>

</html>