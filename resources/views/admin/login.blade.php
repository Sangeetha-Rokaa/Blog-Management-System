<!-- resources/views/auth/admin-login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Animated background particles */
        .bg-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(220, 53, 69, 0.15);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 100px; height: 100px; left: 35%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 70px; height: 70px; left: 50%; animation-delay: 0s; }
        .particle:nth-child(5) { width: 90px; height: 90px; left: 65%; animation-delay: 3s; }
        .particle:nth-child(6) { width: 75px; height: 75px; left: 80%; animation-delay: 5s; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        .admin-container {
            position: relative;
            z-index: 1;
            max-width: 480px;
            width: 100%;
        }

        .alert {
            animation: slideDown 0.5s ease-out;
            border: none;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .admin-card {
            border: none;
            border-radius: 25px;
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: cardEntry 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
            overflow: hidden;
        }

        @keyframes cardEntry {
            from {
                transform: scale(0.8) translateY(50px);
                opacity: 0;
            }
            to {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        .admin-header {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 40px 30px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .admin-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .admin-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            position: relative;
            z-index: 1;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .admin-icon i {
            font-size: 2.5rem;
            color: white;
        }

        .admin-header h4 {
            position: relative;
            z-index: 1;
            margin: 0;
            font-weight: 700;
            letter-spacing: 2px;
            color: white;
            font-size: 1.8rem;
            animation: fadeIn 1s ease-out 0.3s both;
        }

        .admin-header .subtitle {
            position: relative;
            z-index: 1;
            font-size: 0.9rem;
            opacity: 0.9;
            margin-top: 8px;
            color: white;
            animation: fadeIn 1s ease-out 0.5s both;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .admin-body {
            padding: 40px 35px;
        }

        .form-group {
            margin-bottom: 25px;
            animation: slideUp 0.6s ease-out both;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-label i {
            color: #dc3545;
        }

        .input-group-custom {
            position: relative;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px 50px 15px 20px;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
            background: white;
            transform: translateY(-2px);
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #dc3545;
            pointer-events: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .form-control:focus ~ .input-icon {
            color: #c82333;
            transform: translateY(-50%) scale(1.1);
        }

        .btn-admin {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            border-radius: 12px;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            width: 100%;
            color: white;
        }

        .btn-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(220, 53, 69, 0.4);
            color: white;
        }

        .btn-admin:hover::before {
            left: 100%;
        }

        .btn-admin:active {
            transform: translateY(-1px);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
            animation: fadeIn 1s ease-out 0.4s both;
        }

        .back-link a {
            color: #dc3545;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .back-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #dc3545;
            transition: width 0.3s ease;
        }

        .back-link a:hover::after {
            width: 100%;
        }

        .back-link a:hover {
            color: #c82333;
        }

        .back-link a i {
            margin-right: 5px;
            transition: transform 0.3s ease;
        }

        .back-link a:hover i {
            transform: translateX(-5px);
        }

        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .btn-admin.loading .spinner {
            display: inline-block;
        }

        /* Security badge */
        .security-badge {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
            animation: fadeIn 1s ease-out 0.5s both;
        }

        .security-badge i {
            color: #dc3545;
            font-size: 1.2rem;
            margin-right: 8px;
        }

        .security-badge span {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }

        @media (max-width: 576px) {
            .admin-body {
                padding: 30px 25px;
            }
            
            .admin-header {
                padding: 35px 25px;
            }

            .admin-header h4 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="admin-container">
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="admin-card">
            <div class="admin-header">
                <div class="admin-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h4>ADMIN LOGIN</h4>
                <div class="subtitle">Secure Administrative Access</div>
            </div>
            
            <div class="admin-body">
                <form action="{{ route('admin.login') }}" method="POST" id="adminLoginForm">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i>
                            Admin Email
                        </label>
                        <div class="input-group-custom">
                            <input type="email" name="email" class="form-control" 
                                   placeholder="admin@example.com" 
                                   value="{{ old('email') }}" 
                                   required autofocus>
                            <i class="input-icon fas fa-at"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock"></i>
                            Password
                        </label>
                        <div class="input-group-custom">
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Enter your password" 
                                   required>
                            <i class="input-icon fas fa-key"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-admin">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Login as Admin
                        <div class="spinner"></div>
                    </button>
                </form>

                <div class="security-badge">
                    <i class="fas fa-shield-alt"></i>
                    <span>Protected by secure authentication</span>
                </div>

                <div class="back-link">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-arrow-left"></i>
                        Back to User Login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add loading spinner on form submit
        document.getElementById('adminLoginForm').addEventListener('submit', function() {
            const btn = this.querySelector('.btn-admin');
            btn.classList.add('loading');
            btn.disabled = true;
        });
    </script>
</body>