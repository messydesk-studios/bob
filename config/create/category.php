<?php
    
    include('../../db.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $category_name = $_POST["category_name"];
        
        try {
        
            $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (:category_name)");
            $stmt->bindParam(':category_name', $category_name);
            $stmt->execute();
            header("Location: ../../index.php");
            exit();
        
        } catch (PDOException $e) {
        
            echo "Error: " . $e->getMessage();
        
        }
    
    }
    
    $conn = null;
?>