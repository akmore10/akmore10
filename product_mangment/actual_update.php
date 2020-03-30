<?php 
include('config.php');
$flag = 0 ;
if(isset($_POST['selection_button'])){

}
if(isset($_POST['submit'])){

    $id = $_POST['itemid'];
    $name = $_POST['itemName'];
    $description = $_POST['itemDescription'];
    $quantity = $_POST['itemQuantity'];
 
    $sql = "update product set item_name = '".$name."',item_description ='".$description."' ,item_quantity = ".$quantity."  where item_id ='".$id."'";
  
    if ($conn->query($sql) === TRUE) {
        echo "queersr";
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}


?>
