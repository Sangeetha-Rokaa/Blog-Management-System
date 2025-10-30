<!-- resources/views/auth/admin-login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-danger text-white">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Admin Email</label>
                                <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Login as Admin</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none">Back to User Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
