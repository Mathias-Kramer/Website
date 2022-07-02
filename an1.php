<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>


    <style>
        body {
            margin: 0px;
            padding: 0px;
            background-size: cover;
            font-family: 'Open Sans', sans-serif;


        }

        section {
            width: 100vw;
            height: 100vh;
            background: linear-gradient(#e66465, #9198e5);
        }

        .login-box {
            width: auto;
            height: auto;
            position: absolute;
            background-color: white;
            border-radius: 10px;
            padding: 90px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 1px 19px 50px 4px rgba(0, 0, 0, 0.7);
            -webkit-box-shadow: 1px 19px 50px 4px rgba(0, 0, 0, 0.7);
            -moz-box-shadow: 1px 19px 50px 4px rgba(0, 0, 0, 0.7);
        }

        h1 {
            float: left;
            font-size: 40px;
            border-bottom: 6px solid gray;
            margin-bottom: 50px;
            padding: 13px 0;
            color: black;
        }

        .text-login {
            width: 100%;
            overflow: hidden;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid gray;
        }

        .text-login input {
            border: none;
            outline: none;
            background: none;
            color: gray;
            font-size: 18px;
            float: left;
            margin: 0px 10px;
        }

        .btn {
            width: 100%;
            background: gray;
            border: none;
            border-radius: 6px;
            padding: 7px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

        .btn-google {
            width: 100%;
            background: white;
            border: 1px solid gray;
            border-radius: 6px;
            padding: 7px;
            color: black;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

        .btn-google i {
            margin-right: 10px;
        }

        #or-p {
            text-align: center;
        }

        .btn-create-acc {
            width: 100%;
            background: #4d9feb;
            border: 1px solid gray;
            border-radius: 6px;
            padding: 7px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin: 12px 0;
        }

        @media (max-width: 700px) {
            h1 {
                float: left;
                font-size: 25px;
                border-bottom: 6px solid gray;
                margin-bottom: 50px;
                padding: 13px 0;
                color: black;
            }

            .login-box {
                width: 60%;
                height: auto;
                position: absolute;
                background-color: white;
                border-radius: 10px;
                padding: 50px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    </style>


</head>

<body>
    <section>
        <?php
        if (isset($_POST["submit"])) {
            require("mysql.php");
            $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); //Username überprüfen
            $stmt->bindParam(":user", $_POST["username"]);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count == 1) {
                //Username ist frei
                $row = $stmt->fetch();
                if (password_verify($_POST["pw"], $row["PASSWORD"])) {
                    session_start();
                    $_SESSION["username"] = $row["USERNAME"];
                    header("Location: adminpanel.php");
                } else {
                    echo "Der Login ist fehlgeschlagen";
                }
            } else {
                echo "Der Login ist fehlgeschlagen";
            }
        }
        ?>


        <div class="login-box">
            <h1 style="float: none;">Anmelden</h1>
            <form action="an1.php" method="post">
                <div class="text-login">
                    <input type="text" name="username" placeholder="Username" required><br>
                </div>
                <div class="text-login">
                    <input type="password" name="pw" placeholder="Passwort" required><br>
                </div>

                <button class="btn" type="submit" name="submit">Einloggen</button>

            </form>

            <!--<a href="register.php">Noch keinen Account?</a>-->

        </div>
    </section>
</body>

</html>