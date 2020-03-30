<?php
include('config.php');
$sel = $_POST['item_selected'];
$sql= "delete from product where item_id = '".$sel."'";
$conn->query($sql);
$conn->close();
header('Location:index.php');

?>