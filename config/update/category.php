<?php
include('../../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $categoryname = $_POST["category_name"];

    try {
        $stmt = $conn->prepare("UPDATE categories SET category_name=:category_name WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':category_name', $categoryname);
        $stmt->execute();
        header("Location: ../../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>