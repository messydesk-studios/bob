<?php

    include('../../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = $_POST["product_name"];
    $descriptions = $_POST["descriptions"];
    $images = $_POST["images"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    try {
        $stmt = $conn->prepare("INSERT INTO products (product_name, descriptions, images, category, price, stock) VALUES (:product_name, :descriptions, :images, :category, :price, :stock)");
        $stmt->bindParam(':product_name', $productname);
        $stmt->bindParam(':descriptions', $descriptions);
        $stmt->bindParam(':images', $images);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();
        header("Location: ../../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>