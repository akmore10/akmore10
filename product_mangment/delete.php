<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('config.php');
    ?>
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
                    <li class="nav-item">
                        <a class="nav-link" href="update.php">UPDATE</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="delete.php">DELETE<span class="sr-only">(current)</span></a>
                    </li>

     
                </ul>
        
            </div>


        </nav>
        <br>
        <div class="container">
        <form method="post" action="dele_pro.php">
        <div class="form-group">

                <label for="itemId">ITEM ID SELECTION</label>
                <select  onSelect = "getVal()"class="custom-select" id="itemId" aria-describedby=" itemHelp " name="item_selected">
                    <?php 

                    $sql1 = "select * from product ";
                    $result1= $conn->query($sql1);
                    while($row1= $result1->fetch_assoc()){

                    ?>

                <option name='<?php echo $row1['item_id'];?>' value='<?php echo $row1['item_id'];?>' >
                 <?php echo $row1['item_id'];?>
                </option>
                    <?php }
                    $conn->close();
                    ?>

                </select>
                <input type="hidden" name = "selected_item" value="">
                <button type="submit " class="btn btn-primary ">Submit</button>
        </form>

    </div>


   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="javascript">
        function getVal(){
            
        var sel = document.getElementById('itemID');
        var val = sel.option;
        console.log(sel.option);
        }
    </script>


</body>

</html>