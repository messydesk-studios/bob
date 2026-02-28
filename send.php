
<?php
include('db.php');

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {*/
    $productname = $_POST["product_name"];
    $name = $_POST["name"];
    $address = $_POST["address"];;

    // the message
    $msg = "$name would like to purchase $productname";

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail("richardlucasmichael@icloud.com","New order!",$msg);

    header("Location: /index.php");
    exit();

    /*}*/

$conn = null;
?>