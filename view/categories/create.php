<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Create Category</h2>
        <a href="../index.php">Back to Product List</a>
        <br><br>
        <form action="../../config/create/category.php" method="post">
            <label for="product_name">Category Name:</label>
            <input type="text" name="category_name" required><br>
            <input type="submit" value="Add Category">
        </form>
    </body>
</html>