<!-- register.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gradient bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="text-center mb-4 fw-bold text-primary">
                        <i class="bi bi-person-circle me-2"></i>Register
                    </h3>
                    <form method="POST" action="index.php?page=register-controller">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone" class="form-control" placeholder="01xxxxxxxxx">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-pill fw-semibold">
                            <i class="bi bi-check2-circle me-1"></i> Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>