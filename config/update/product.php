<?php
    
    include('../../db.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $productname = $_POST["product_name"];
        $descriptions = $_POST["descriptions"];
        $images = $_POST["images"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $category = $_POST["category"];
    
        try {
            
            $stmt = $conn->prepare("UPDATE products SET product_name=:product_name, descriptions=:descriptions, images=:images, category=:category, price=:price, stock=:stock WHERE id=:id");

            $stmt->bindParam(':id', $id);
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
        
            echo "Error updating record: " . $e->getMessage();
        
        }
    }
    
    $conn = null;
?>