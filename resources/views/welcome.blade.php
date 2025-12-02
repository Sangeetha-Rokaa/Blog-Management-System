<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
            padding: 20px;
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
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }

        .particle:nth-child(1) { width: 120px; height: 120px; left: 5%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 80px; height: 80px; left: 15%; animation-delay: 3s; }
        .particle:nth-child(3) { width: 140px; height: 140px; left: 30%; animation-delay: 6s; }
        .particle:nth-child(4) { width: 100px; height: 100px; left: 50%; animation-delay: 2s; }
        .particle:nth-child(5) { width: 110px; height: 110px; left: 65%; animation-delay: 5s; }
        .particle:nth-child(6) { width: 90px; height: 90px; left: 80%; animation-delay: 7s; }
        .particle:nth-child(7) { width: 130px; height: 130px; left: 20%; animation-delay: 4s; }
        .particle:nth-child(8) { width: 95px; height: 95px; left: 70%; animation-delay: 8s; }

        @keyframes float {
            0%, 100% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-150px) rotate(360deg); opacity: 0; }
        }

        /* Glowing orbs */
        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: pulse 8s infinite ease-in-out;
            z-index: 0;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(102, 126, 234, 0.3);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 350px;
            height: 350px;
            background: rgba(118, 75, 162, 0.3);
            bottom: -100px;
            right: -100px;
            animation-delay: 2s;
        }

        .orb-3 {
            width: 300px;
            height: 300px;
            background: rgba(240, 147, 251, 0.3);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 4s;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.5; }
        }

        .welcome-container {
            position: relative;
            z-index: 1;
            max-width: 450px;
            width: 100%;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            padding: 40px 35px;
            text-align: center;
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3),
                        0 0 0 1px rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: cardEntry 1s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            animation: shine 4s infinite;
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

        @keyframes shine {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            animation: logoEntry 1s ease-out 0.3s both;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            position: relative;
            z-index: 1;
        }

        @keyframes logoEntry {
            from {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }
            to {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        .welcome-card h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            animation: fadeIn 1s ease-out 0.5s both;
            position: relative;
            z-index: 1;
        }

        .welcome-card p {
            font-size: 1rem;
            margin-bottom: 30px;
            opacity: 0.95;
            animation: fadeIn 1s ease-out 0.7s both;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .btn-custom {
            width: 100%;
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.6s ease-out both;
        }

        .btn-custom:nth-child(1) { animation-delay: 0.9s; }
        .btn-custom:nth-child(2) { animation-delay: 1.0s; }
        .btn-custom:nth-child(3) { animation-delay: 1.1s; }

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

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-custom:hover::before {
            left: 100%;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-custom:active {
            transform: translateY(-1px);
        }

        .btn-user {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            color: white;
        }

        .btn-user:hover {
            box-shadow: 0 10px 30px rgba(17, 153, 142, 0.4);
        }

        .btn-register {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-register:hover {
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-admin {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
        }

        .btn-admin:hover {
            box-shadow: 0 10px 30px rgba(245, 87, 108, 0.4);
        }

        .btn-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-custom:hover .btn-icon {
            transform: scale(1.2) rotate(10deg);
        }

        footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            z-index: 1;
            animation: fadeIn 1.5s ease-out 1.3s both;
        }

        footer i {
            color: #ff6b6b;
            animation: heartbeat 1.5s ease-in-out infinite;
        }

        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            10%, 30% { transform: scale(1.1); }
            20%, 40% { transform: scale(0.9); }
        }

        /* Decorative elements */
        .decorative-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            margin: 25px 0;
            animation: fadeIn 1s ease-out 0.8s both;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 576px) {
            .welcome-card {
                padding: 30px 20px;
            }

            .welcome-card h1 {
                font-size: 1.6rem;
            }

            .logo {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .btn-custom {
                padding: 12px 18px;
                font-size: 0.95rem;
            }
        }

        /* Loading animation */
        .btn-custom.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-custom.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Glowing Orbs -->
    <div class="glow-orb orb-1"></div>
    <div class="glow-orb orb-2"></div>
    <div class="glow-orb orb-3"></div>

    <div class="welcome-container">
        <div class="welcome-card">
            <div class="logo">
                <i class="fas fa-blog"></i>
            </div>
            <h1>Welcome to My Blog</h1>
            <p>Discover, share, and explore amazing stories</p>
            
            <div class="decorative-line"></div>

            <div class="button-group">
                <a href="{{ route('login') }}" class="btn-custom btn-user" onclick="addLoadingState(this)">
                    <i class="fas fa-user btn-icon"></i>
                    <span>User Login</span>
                </a>
                
                <a href="{{ route('registration') }}" class="btn-custom btn-register" onclick="addLoadingState(this)">
                    <i class="fas fa-user-plus btn-icon"></i>
                    <span>User Registration</span>
                </a>
                
                <a href="{{ route('admin.login') }}" class="btn-custom btn-admin" onclick="addLoadingState(this)">
                    <i class="fas fa-user-shield btn-icon"></i>
                    <span>Admin Login</span>
                </a>
            </div>
        </div>
    </div>

    <footer>
        <p>© {{ date('Y') }} My Blog | Made by Sangeetha <i class="fas fa-heart"></i> | All Rights Reserved</p>
    </footer>

    <script>
        // Add loading state to buttons
       

        // Add ripple effect on click
        document.querySelectorAll('.btn-custom').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.5);
                    left: ${x}px;
                    top: ${y}px;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;

                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const cards = document.querySelectorAll('.welcome-card');
            const x = (e.clientX / window.innerWidth - 0.5) * 20;
            const y = (e.clientY / window.innerHeight - 0.5) * 20;

            cards.forEach(card => {
                card.style.transform = `perspective(1000px) rotateY(${x}deg) rotateX(${-y}deg)`;
            });
        });
    </script>
</body>
</html>