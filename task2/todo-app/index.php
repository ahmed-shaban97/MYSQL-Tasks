<!-- index.php -->
<?php
require_once('database/db_conn.php');
session_start();
$sql = 'SELECT * FROM tasks';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="handler/stored-data.php" method="POST" class="form border p-2 my-5">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                    <input type="text" name="title" class="form-control my-3 border border-success"
                        placeholder="add new todo">
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 "
                        placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td>
                                <a href="handler/delete-task.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i
                                        class="fa-solid fa-trash-can"></i> </a>
                                <a href="handler/edit.php?id= <?= $row['id'] ?>" class="btn btn-info"><i
                                        class="fa-solid fa-edit"></i> </a>
                            </td>
                        </tr>
                        <?php endwhile ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>