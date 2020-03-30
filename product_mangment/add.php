<!doctype html>
<html lang="en">

<head>
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
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="add.php">ADD<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update.php">UPDATE</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="delete.php">DELETE</a>
                    </li>


                </ul>
  
            </div>


        </nav>
        <br>
        <div class="container">
        <form method="POST" action="add.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="itemName">ITEM ID</label>
                <input type="text" class="form-control" id="itemName" name="itemID" aria-describedby="itemHelp">
                <small id="itemHelp" class="form-text text-muted">Enter item id.</small>
            </div>

            <div class="form-group">
                <label for="itemName">ITEM NAME</label>
                <input type="text" class="form-control" id="itemName" name="itemName" aria-describedby=" itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter name of the item.</small>
            </div>

            <div class="form-group ">
                <label for="itemDescription ">ITEM DESCRIPTION</label>
                <input type="text " class="form-control " id="itemDescription " name="itemDescription" aria-describedby="itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter name of the Description.</small>
            </div>

            <div class="form-group ">
                <label for="itemQuantity ">ITEM QUANTITY</label>
                <input type="number" class="form-control " id="itemQuantity" name="itemQuantity" aria-describedby="itemHelp ">
                <small id="itemHelp " class="form-text text-muted ">Enter quantity of the item.</small>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="itemImage" aria-describedby="itemHelp" name="imageUP">
                <label class="custom-file-label" for="itemImage" value ="Chose the image"></label>
             
                <small id="itemHelp " class="form-text text-muted ">Enter path of the item image.</small>
            </div>
            <br><br>
            <button type="submit " name ="submit"class="btn btn-primary ">Submit</button>
        </form>
        </div>

<!-- PHP script Section -->

    <?php
  
    if(isset($_POST['submit'])){
  
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imageUP"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imageUP"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
    
        // Check file size
        if ($_FILES["imageUP"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imageUP"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imageUP"]["name"]). " has been uploaded.";
            } else {
                die();
                echo "Sorry, there was an error uploading your file.";
            }
    
        }
      
  
        $id = $_POST['itemID'];
        $name = $_POST['itemName'];
        $description = $_POST['itemDescription'];
        $quantity = $_POST['itemQuantity'];
        $image =$_FILES["imageUP"]["name"];
        
        $sql= "INSERT INTO `product` ( `item_id`, `item_name`, `item_description`, `item_quantity`,`item_image`) 
        VALUES ( '$id', '$name', '$description', '$quantity','$image')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
   
    
    ?>
    
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6 " crossorigin="anonymous "></script>
</body>

</html>