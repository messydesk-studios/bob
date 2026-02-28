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
    <title>Update Category - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Update Category</h2>
        <a href="../index.php">Back to Product List</a>
        <br><br>

        <?php if (count($row) > 0) : ?>
            <form action="../../config/update/category.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="product_name">Category Name:</label>
                <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>" required><br>
                
                <input type="submit" value="update category">
            </form>
        <?php else : ?>
            <p>Data not found</p>
        <?php endif ?>
    </body>
</html>