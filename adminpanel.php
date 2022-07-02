<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: an1.php");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>



    <nav>
        <a href="index.html"><img src="icon21.png"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="adminpanel.php">HOME</a></li>
                <li><a href="messagesadmin.php">MESSAGES</a></li>
                <li><a href="newsadmin.php">NEWS</a></li>
                <li><a href="trackingadmin.php">TRACKING</a></li>
                <li><a href="#">LOGOUT</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

    <section id="admin-heading">
        <br><br><br>
        <h1>Home</h1>
        <h2>Welcome Home Mathias</h2>
    </section>








    <section id="messages-new">
        <h2 style="text-align: center;">Newest Messages:</h2>
        <div id="messages-container">







            <?php

            require("mysql.php");
            $stmt = $mysql->prepare("SELECT * FROM kontakformulartabel ORDER BY CREATED_AT DESC LIMIT 3");
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count == 0) {
                echo "Es wurden keine News gefunden";
            } else {
                while ($row = $stmt->fetch()) {
            ?>
                    <div id="messege-one">
                        <h1><?php echo $row["TITEL"]; ?></h1>
                        <p><?php echo $row["MESSAGE"]; ?></p>
                        <p><?php echo date("d.m.Y H:i", $row["CREATED_AT"]) ?></p>
                    </div>

            <?php

                }
            }

            ?>





















            <!--
            <h2>Frage zur Website</h2>
            <p>Mathias Kramer</p>
            <p>test@kramermathias.dev</p>
            <p>Hallo, <br> meine Frage ist welchen Hoster haben sie für ihre <br> website genutzt und kennen Sie sich mit PHP aus? <br> Mit Freundlichen Grüßen Mathias Kramer</p>
            <p>22.06.2022, 17:16</p>


            <div id="messege-one">
                <h2>Frage zur Website</h2>
                <p>Mathias Kramer</p>
                <p>test@kramermathias.dev</p>
                <p>Hallo, <br> meine Frage ist welchen Hoster haben sie für ihre <br> website genutzt und kennen Sie sich mit PHP aus? <br> Mit Freundlichen Grüßen Mathias Kramer</p>
                <p>22.06.2022, 17:16</p>
            </div>

            <div id="messege-one">
                <h2>Frage zur Website</h2>
                <p>Mathias Kramer</p>
                <p>test@kramermathias.dev</p>
                <p>Hallo, <br> meine Frage ist welchen Hoster haben sie für ihre <br> website genutzt und kennen Sie sich mit PHP aus? <br> Mit Freundlichen Grüßen Mathias Kramer</p>
                <p>22.06.2022, 17:16</p>
            </div>

            <div id="messege-one">
                <h2>Frage zur Website</h2>
                <p>Mathias Kramer</p>
                <p>test@kramermathias.dev</p>
                <p>Hallo, <br> meine Frage ist welchen Hoster haben sie für ihre <br> website genutzt und kennen Sie sich mit PHP aus? <br> Mit Freundlichen Grüßen Mathias Kramer</p>
                <p>22.06.2022, 17:16</p>
            </div>
-->
        </div>
    </section>


    <section id="admin-tracking">
        <h2 style="text-align: center;">Tracking:</h2>

    </section>


</body>

</html>