<!-- blog index.php -->
<?php
$blogs = getBlog();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Blogs Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Blogs</h3>
            <a class="btn btn-primary rounded-pill px-4 shadow-sm href" href="index.php?page=create-blog">
                ➕ Create Blog
            </a>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 20%;">Title</th>
                            <th scope="col" style="width: 20%;">Image</th>
                            <th scope="col">Content</th>
                            <th scope="col" class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($blogs as $blog): ?>
                        <?php
                            $base_url = "http://" . $_SERVER["HTTP_HOST"] . "/MYSQL/task5/blogSystem";
                            $image_path = $base_url . $blog['image'];

                            ?>
                        <tr>
                            <td><strong><?= $blog['title'] ?></strong></td>
                            <td>
                                <img src="<?= $image_path ?>" class="img-fluid rounded shadow-sm" alt="Blog Image"
                                    style="width:150px; height:100px; object-fit:cover;">

                            </td>
                            <td>
                                <?= $blog['content'] ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-secondary me-1">Edit</button>
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>