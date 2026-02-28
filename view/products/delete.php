<?php

    include('../../db.php');

    $id = $_GET['id'];
    
    try {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = [];
        
        if ($stmt->rowCount() > 0) {
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        }
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    
    }

    $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Delete Product</h2>
        <a href="../../index.php">Back to Product List</a>
        <br><br>
        <?php if (count($row) > 0) : ?>
            <p>Are you sure you want to delete the following product?</p>
            <table>
                <tr>
                    <td>ID:</td>
                    <td><?php echo $row["id"]; ?></td>
                </tr>
                <tr>
                    <td>Product Name:</td>
                    <td><?php echo $row["product_name"]; ?></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><?php echo $row["descriptions"]; ?></td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><?php echo "<img src=\"".$row["images"]."\" width=100>"; ?></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><?php echo "<img src=\"".$row["category"]."\" width=100>"; ?></td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>$<?php echo $row["price"]; ?></td>
                </tr>
                <tr>
                    <td>Stock:</td>
                    <td><?php echo $row["stock"]; ?></td>
                </tr>
            </table>
            <form action="../../config/delete/product.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Delete Product">
            </form>
        <?php else : ?>
            <p>Data not found!</p>
        <?php endif ?>
    </body>
</html>