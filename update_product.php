<?php
session_start();
if (!isset($_SESSION["user_id"]))
{
    header("location: login.php");
    exit();
}
if($_SESSION["access_level"] == 2)
{
    header("location: login.php");
    exit();
}
?>
<?php
require_once("database_1.php");

$oldname = filter_input(INPUT_POST, "oldname");
$category_id = filter_input(INPUT_POST, "category_id");
$name = filter_input(INPUT_POST, "name");
$price = filter_input(INPUT_POST, "price");

$query = "UPDATE shopping_items SET category = :np_category_id, item_name = :np_name, item_price = :np_price WHERE item_name =:np_oldname";

$statement = $db -> prepare($query);
$statement -> bindValue(":np_category_id", $category_id);
$statement -> bindValue(":np_name", $name);
$statement -> bindValue(":np_price", $price);
$statement -> bindValue(":np_oldname", $oldname);
$statement -> execute();
$statement -> closeCursor();

include("index.php");