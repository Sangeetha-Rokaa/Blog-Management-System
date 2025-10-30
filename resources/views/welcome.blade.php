<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4f46e5, #6c63ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            width: 400px;
            text-align: center;
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
        }
        .welcome-card h1 {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .welcome-card p {
            font-size: 1rem;
            margin-bottom: 30px;
        }
        .btn-custom {
            width: 100%;
            margin: 10px 0;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-user { background-color: #198754; color: white; }
        .btn-register { background-color: #0d6efd; color: white; }
        .btn-admin { background-color: #dc3545; color: white; }
        .btn-custom:hover { transform: scale(1.05); }
        footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            text-align: center;
            color: #e0e0e0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="welcome-card">
        <h1>Welcome to My Blog</h1>
        <p>Select an option to continue:</p>

        <a href="{{ route('login') }}" class="btn btn-custom btn-user">👤 User Login</a>
        <a href="{{ route ('registration') }}" class="btn btn-custom btn-register">📝 User Registration</a>
        <a href="{{ route ('admin') }}" class="btn btn-custom btn-admin">🧑‍💼 Admin Login</a>
    </div>

    <footer>
        © {{ date('Y') }} My Blog | All Rights Reserved
    </footer>

</body>
</html>
