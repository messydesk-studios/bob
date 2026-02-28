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
    <title>View Product - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
    <h2>Product Details</h2>
    <a href="../../index.php">Back to Product List</a>
    <br><br>

    <!-- Data details are displayed with php code -->
    <?php if (count($row) > 0) : ?>
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
                <td>Images</td>
                <td><?php echo "<img src=\"".$row["images"]."\" width=100>"; ?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?php echo "<img src=\"".$row["category"]."\" width=100>"; ?></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>$<?php echo $row["price"]; ?></td>
            </tr>
            <tr>
                <td>Quantity:</td>
                <td><?php echo $row["stock"]; ?></td>
            </tr>
        </table>
    <?php else : ?>
        <p>0 Result</p>
    <?php endif ?>
   <!--<form action="../../send.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="address">Address:</label>
        <input type="text" name="address" required><br>
        <input type="submit" value="purchase">
    </form>-->
    </body>
</html>