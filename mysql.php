   
<?php
$host = "db5008964405.hosting-data.io";
$name = "dbs7568021";
$user = "dbu2723627";
$passwort = "Mathias1607!Sheldon$";
try {
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e) {
    echo "SQL Error: " . $e->getMessage();
}
?>