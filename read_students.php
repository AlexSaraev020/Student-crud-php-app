<?php include("dbcon.php") ?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $f_name = $_GET['firstName'];
        $l_name = $_GET['lastName'];
        $age = $_GET['age'];

        $query = "SELECT * FROM `students` ";


    }



?>
