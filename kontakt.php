<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">


    <style>
        #line {
            width: 50%;
            height: 3px;
            background: #494949;
            border: 0px;
            margin: 0px auto 40px auto;
            border-radius: 500px;
        }

        .form-item-con {
            margin: auto;
            text-align: center;
        }

        #Kontakt {
            margin-top: 70px;
            margin-bottom: 150px;
        }

        #kontakt-h {
            text-align: center;
        }

        .name-form {
            border-radius: 5px;
            border: none;
            color: black;
            width: 350px;
            border: 0.5px solid gray;
            height: 25px;
        }

        .email-form {
            border-radius: 5px;
            border: none;
            color: black;
            width: 350px;
            border: 0.5px solid gray;
            height: 25px;
        }

        .msg-form {
            border-radius: 5px;
            border: none;
            color: black;
            width: 350px;
            border: 0.5px solid gray;
        }

        .abschicken-btn {
            /*width: 100%;*/
            background: gray;
            border: 1px solid gray;
            border-radius: 15px;
            padding: 8px;
            color: black;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
            width: 350px;
        }
    </style>



</head>

<body>



    <nav>
        <a href="index.html"><img src="icon21.png"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="index.html">ABOUT</a></li>
                <li><a href="index.html">PROJECTS</a></li>
                <li><a href="kontakt.html">CONTACT</a></li>
                <li><a href="Login.html"><i id="login-io" class="fa fa-user" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>





    <?php
    if (isset($_POST["submit"])) {
        require("mysql.php");

        $smtp = $mysql->prepare("INSERT INTO kontakformulartabel (NAME, TITEL, MESSAGE, EMAIL, CREATED_AT ) VALUES (:name, :titel, :message, :email, :now)");
        $smtp->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
        $smtp->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
        $smtp->bindParam(":titel", $_POST["titel"], PDO::PARAM_STR);
        $smtp->bindParam(":message", $_POST["msg"], PDO::PARAM_STR);

        $now = time();
        $smtp->bindParam(":now", $now, PDO::PARAM_STR);
        $smtp->execute();
        echo "Die Nachricht wurde gesendet";
    }
    ?>


    <section id="Kontakt">
        <h1 id="kontakt-h">Kontaktiere Mich</h1>
        <hr id="line">


        <form action="kontakt.php" method="POST">
            <div class="form-item-con">

                <input class="name-form" type="text" name="name" placeholder="Name" required><br><br>
                <input class="email-form" type="email" name="email" placeholder="Email" required><br><br>
                <input class="name-form" type="text" name="titel" placeholder="Titel" required><br><br>
                <textarea class="msg-form" rows="9" cols="30" name="msg" placeholder="Nachricht" required></textarea><br><br>
                <br<br>
                    <button class="abschicken-btn" type="submit" name="submit">Abschicken</button>

            </div>
        </form>


    </section>

    <br><br><br>

    <div id="footer-div">



        <div>
            <p id="follow-h">Follow Me On:</p>

            <div class="icons">
                <a href="https://www.facebook.com/mathias.kramer.5439"> <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                <a href="https://twitter.com/mathiasletsgo"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/mathiaskramer_/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.linkedin.com/in/mathias-kramer-b92529225/"> <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>

            </div>
        </div>

        <div id="credit-con">
            <p>Made By <br> Mathias Kramer</p>
        </div>


        <div id="daten">
            <a href="impressum.html">Datenschutz</a><br><br>
            <a href="impressum.html">Impressum</a><br><br>
            <a href="kontakt.html">Kontakt</a>
        </div>

    </div>





    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0px";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>

</body>

</html>