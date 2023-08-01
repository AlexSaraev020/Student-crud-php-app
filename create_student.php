<?php include("dbcon.php") ?>

<?php

if (isset($_POST["add_student"])) {
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $age = $_POST["age"];

    if ($f_name && $l_name && $age == "" || empty($f_name) && empty($l_name) && empty($age)) {
        header("location:index.php?fail_msg=You have to fill all the fields");
    } else {

        $query = "INSERT INTO `students` (firstName,lastName,age) VALUES ('$f_name','$l_name','$age')";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Insert data failed");
        } else {
            header("location:index.php?create_msg=You inserted the data successfully!");
        }
    }
}





?>