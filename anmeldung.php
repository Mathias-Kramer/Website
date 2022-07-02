<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        require("mysql.php");
        $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user "); //Username überprüfen
        $stmt->bindParam(":user", $_POST["username"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 0) {
            //Username ist frei
            if ($_POST["pw"] == $_POST["pw2"]) {
                //User anlegen
                $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
                $stmt->bindParam(":user", $_POST["username"]);
                $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);

                $stmt->bindParam(":pw", $hash);
                $stmt->execute();
                echo " Dein ACC wurde angelegt";
            } else {
                echo "Die Passwörter stimmen nicht überrein";
            }
        } else {
            echo "Der  Username ist vergeben";
        }
    }


    ?>

    anmeldung
    <h1>Account erstellen</h1>
    <form action="anmeldung.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="pw" placeholder="Passwort" required><br>
        <input type="password" name="pw2" placeholder="Passwort wiederholen" required><br>

        <button type="submit" name="submit">erstellen</button>

    </form>
    <br>

    <a href="an1.php">Schon einen Account</a>

</body>

</html>