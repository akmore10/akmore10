<!doctype html>
<html lang="en">

<head>
<?php
// Start the session
session_start();
?>
    <?php include('config.php');?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Proger</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Proger</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">ADD</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="update.php">UPDATE<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">DELETE</a>
                    </li>

              

                </ul>
   
            </div>


        </nav>
        <br>
        <div class="container">
        <form method="POST" action="update.php">
            <?php
            $selected_item; 
                if(isset($_POST['select_button'])){
                    $selected_item = $_POST['item_id_selected'];
                
                }
                else{

                    $selected_item = $_SESSION['select_item'];
                
                }
                $sql = "select * from product where item_id = '".$selected_item."'";
                $result = $conn->query($sql);
                $row= $result->fetch_assoc();
            ?>
            <div class="form-group">

                <label for="itemId">ITEM ID SELECTION</label>
                <select class="custom-select" id="itemId" aria-describedby=" itemHelp " name="item_id_selected">
                <?php 
                
                $sql1 = "select * from product ";
                $result1= $conn->query($sql1);
                while($row1= $result1->fetch_assoc()){
                
                ?>
                
                <option value=<?php echo $row1['item_id'];?>>
                <?php echo $row1['item_id'];?>
                </option>
                <?php }?>
                
            </select>
                
                <small id="itemHelp " class="form-text text-muted ">Select the item to update</small>
                
                <button name="select_button" type="submit" class="btn btn-primary " value="submit">Submit</button>
            </div>

             </form>
             <form action="actual_update.php" method="post">   
            <div class="form-group">
                <label for="itemName">ITEM ID</label>
                <input type="text" class="form-control" readonly id="itemName" value = "<?php echo $row['item_id'];?>"name="itemid" aria-describedby=" itemHelp ">
            
            </div>

            <div class="form-group">
                <label for="itemName">ITEM NAME</label>
                <input type="text" class="form-control" id="itemName" value = "<?php echo $row['item_name'];?>"name="itemName" aria-describedby=" itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter name of the item.</small>
            </div>

            <div class="form-group ">
                <label for="itemDescription ">ITEM DESCRIPTION</label>
                <input type="text " class="form-control " id="itemDescription " value="<?php echo $row['item_description'];?>"name="itemDescription" aria-describedby="itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter name of the Description.</small>
            </div>

            <div class="form-group ">
                <label for="itemQuantity ">ITEM QUANTITY</label>
                <input type="number" class="form-control " id="itemQuantity" name="itemQuantity" value="<?php echo $row['item_quantity'];?>" aria-describedby="itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter quantity of the item.</small>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="itemImage" value = "<?php echo $row['item_image'];?>"aria-describedby="itemHelp" name="imageUP">
                <label class="custom-file-label" for="itemImage"><?php echo $row['item_image'];?></label>
                <small id="itemHelp " class="form-text text-muted ">Enter path of the item image.</small>
            </div>
            <br><br>
            <button type="submit " name = "submit" class="btn btn-primary ">Submit</button>
        </form>
                <?php 
                $conn->close();
                ?>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>