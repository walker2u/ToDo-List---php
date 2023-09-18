<?php
require 'include/db.php';
require 'include/view.php';
require 'include/controller.php';
$result = viewTasks();

if (isset($_GET['del'])) {

    $id = $_GET['del'];
    delTask($id);
    unset($_GET['del']);
    header('Location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List By Mayank ...</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
    <style>
        #error {
            color:red;
            text-align: center;
            margin-top: -10px;
            padding: 0;
        }
    </style>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>
                            <?php 
                                session_start();
                                if(isset($_SESSION['error'])){
                                    $error = $_SESSION['error'];
                                    echo "<p id='error'>$error</p>";
                                    unset($_SESSION['error']);
                                }
                            ?>
                            <form action="include/save.php" method="post"
                                class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <input type="text" id="form1" class="form-control" name="task">
                                        <label class="form-label" for="form1">Enter a task here</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                                </div>
                            </form>

                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Todo item</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; while ($row = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $i;$i++; ?>
                                            </th>
                                            <td>
                                                <?php echo $row['todo_item']; ?>
                                            </td>
                                            <td>In progress</td>
                                            <td>
                                                <a href="index.php?del=<?php echo $row['id']; ?>"><button type="submit"
                                                        class="btn btn-danger">Delete</button></a>
                                                <button type="submit" class="btn btn-success ms-1">
                                                    <?php echo $row['status']; ?>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>