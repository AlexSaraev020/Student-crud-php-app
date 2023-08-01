<?php include("dbcon.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add students
            </button>

            <div class="col-12">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from `students`";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("Connection failed!");
                        } else {

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id'] ?></th>
                                    <td class="w-25"><?php echo $row['firstName'] ?></td>
                                    <td><?php echo $row['lastName'] ?></td>
                                    <td><?php echo $row['age'] ?></td>
                                    <td><a href="update_page.php?id=<?php echo $row['id'] ?>">Update</a></td>
                                    <td><a href="delete_student.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if (isset($_GET['fail_msg']))
                    echo "<h6>" . $_GET['fail_msg'] . "</h6>";

                ?>
                <?php
                if (isset($_GET['update_msg']))
                    echo "<h6>" . $_GET['update_msg'] . "</h6>";

                ?>
                <?php
                if (isset($_GET['create_msg']))
                    echo "<h6>" . $_GET['create_msg'] . "</h6>";

                ?>
                <?php
                if (isset($_GET['delete_msg']))
                    echo "<h6>" . $_GET['delete_msg'] . "</h6>";

                ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Add students</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="create_student.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="First name" name="f_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last name</label>
                            <input type="text" class="form-control" placeholder="Last name" name="l_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Age</label>
                            <input type="number" class="form-control" placeholder="Age" name="age">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="add_student" value="Add" />
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</body>

</html>