<?php include("dbcon.php") ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `students` WHERE `id` = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Erorr');
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
    $query = "UPDATE `students` SET `firstName` = '$fname' , `lastName` = '$lname' , `age` = '$age' WHERE `id` = $id";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Error');
    }else{
        header("location:index.php?update_msg=You updated the date successfuly");
    }

}
?>

<form action="update_page.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="exampleInputEmail1">First name</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="First name" name="f_name" value=<?php echo $row['firstName'] ?>>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Last name</label>
        <input type="text" class="form-control" placeholder="Last name" name="l_name" value=<?php echo $row['lastName'] ?>>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Age</label>
        <input type="number" class="form-control" placeholder="Age" name="age" value=<?php echo $row['age'] ?>>
    </div>
    <div class="modal-footer">
        <a href="index.php" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <input type="submit" class="btn btn-primary" name="update" value="Update" />
    </div>
</form>