<?php

    include('../../db.php');

    $id = $_GET['id'];
    
    try {
        $stmt = $conn->prepare("SELECT * FROM categories WHERE id = :id");
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
    <title>Delete Category - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Delete Category</h2>
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
                    <td>Category Name:</td>
                    <td><?php echo $row["category_name"]; ?></td>
                </tr>
            </table>
            <form action="../../config/delete/category.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Delete Product">
            </form>
        <?php else : ?>
            <p>Data not found!</p>
        <?php endif ?>
    </body>
</html>