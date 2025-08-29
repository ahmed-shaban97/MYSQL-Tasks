<?php
require_once('../database/db_conn.php');
if (isset($_GET['id'])) {
    $id = trim($_GET['id']);
    $sql = "SELECT * FROM tasks WHERE id = '$id'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white text-center">
                <h4>Edit Task</h4>
            </div>
            <div class="card-body p-4">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="<?= htmlspecialchars($result['title']) ?>">
                    </div>

                    <input type="hidden" value="<?= $id ?>" name="id">

                    <div class="d-flex justify-content-between">
                        <a href="../index.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>