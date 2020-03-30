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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">ADD</a>
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
            <div class="row">
             
        <?php
        
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="card" style="width:20rem;margin:30px">

            <img src="uploads/<?php echo $row['item_image']?>" class="card-img-top" alt="..." style="height:20rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['item_name'] ?></h5>
                <p class="card-text"><?php echo $row['item_description']?></p>
                <a href="update.php" class="btn btn-primary">Update</a>
                <?php $_SESSION['select_item']=$row['item_id']?>
            </div>

        </div>


    <?php }
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