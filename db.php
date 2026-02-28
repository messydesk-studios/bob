<?php
$servername = "sql211.infinityfree.com";
$username = "if0_41268447";
$password = "VagUdviXF9spL1K";
$dbname = "if0_41268447_marketplace2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>