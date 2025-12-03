<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        /* Reset & Body */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Animated Background Particles */
        .particles {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            overflow: hidden; z-index: 0; pointer-events: none;
        }
        .particle {
            position: absolute; background: rgba(255,255,255,0.1); border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }
        .particle:nth-child(1){ width:80px;height:80px;left:10%;animation-delay:0s; }
        .particle:nth-child(2){ width:60px;height:60px;left:20%;animation-delay:2s; }
        .particle:nth-child(3){ width:100px;height:100px;left:60%;animation-delay:4s; }
        .particle:nth-child(4){ width:70px;height:70px;left:80%;animation-delay:6s; }
        .particle:nth-child(5){ width:90px;height:90px;left:40%;animation-delay:8s; }

        @keyframes float {
            0%,100% { transform: translateY(100vh) rotate(0deg); opacity:0; }
            10% { opacity:0.3; } 90% { opacity:0.3; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity:0; }
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 280px;
            background: rgba(33,37,41,0.95);
            backdrop-filter: blur(10px);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 30px 0;
            box-shadow: 4px 0 20px rgba(0,0,0,0.3);
            z-index: 1000;
            animation: slideInLeft 0.6s ease-out;
        }
        @keyframes slideInLeft { from { transform: translateX(-100%); opacity:0;} to{ transform:translateX(0); opacity:1; } }

        .sidebar-header { text-align:center; margin-bottom:40px; padding:0 20px; }
        .sidebar-header h4 { color:#ff6b6b; font-weight:700; font-size:28px; text-transform:uppercase; letter-spacing:2px; animation: glow 2s ease-in-out infinite; }
        @keyframes glow {
            0%,100% { text-shadow:0 0 10px #ff6b6b,0 0 20px #ff6b6b; }
            50% { text-shadow:0 0 20px #ff6b6b,0 0 30px #ff6b6b,0 0 40px #ff6b6b; }
        }

        .sidebar a {
            color: rgba(255,255,255,0.8);
            display:flex; align-items:center;
            text-decoration:none;
            padding:15px 25px; margin:5px 15px;
            transition: all 0.3s ease; border-radius:10px;
            position:relative; overflow:hidden;
        }
        .sidebar a i { margin-right:15px; font-size:20px; transition: transform 0.3s ease; }
        .sidebar a::before {
            content:''; position:absolute; left:0; top:0;
            height:100%; width:0;
            background: linear-gradient(90deg, #ff6b6b, #ee5a6f);
            transition: width 0.3s ease; z-index:-1;
        }
        .sidebar a:hover::before, .sidebar a.active::before { width:100%; }
        .sidebar a:hover, .sidebar a.active { color:white; transform:translateX(5px); }
        .sidebar a:hover i { transform: scale(1.2) rotate(5deg); }

        /* Content Area */
        .content { margin-left:280px; padding:40px; width:calc(100% - 280px); position:relative; z-index:1; }
        .section { display:none; animation: fadeInUp 0.6s ease-out; }
        .section.active { display:block; }
        @keyframes fadeInUp { from {opacity:0; transform:translateY(30px);} to{opacity:1; transform:translateY(0);} }

        /* Dashboard Cards */
        .dashboard-card {
            background: rgba(255,255,255,0.95);
            border-radius:20px; padding:30px; margin-bottom:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
            transition: all 0.3s ease; animation: fadeInUp 0.6s ease-out;
        }
        .dashboard-card:hover { transform:translateY(-10px); box-shadow:0 15px 40px rgba(0,0,0,0.3); }

        .welcome-section { background: linear-gradient(135deg,#ff6b6b 0%,#ee5a6f 100%); color:white; }
        .welcome-section h2 { font-size:36px; font-weight:700; margin-bottom:15px; }

        /* Stats */
        .stats-container { display:grid; grid-template-columns: repeat(auto-fit,minmax(250px,1fr)); gap:20px; margin-top:30px; }
        .stat-card { background:white; border-radius:15px; padding:25px; text-align:center; box-shadow:0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease; animation: scaleIn 0.6s ease-out; }
        .stat-card:hover { transform:translateY(-5px) scale(1.05); box-shadow:0 8px 25px rgba(0,0,0,0.15); }
        .stat-icon { font-size:48px; margin-bottom:15px; background: linear-gradient(135deg,#667eea 0%,#764ba2 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent; animation: pulse 2s ease-in-out infinite; }
        @keyframes pulse { 0%,100%{ transform:scale(1); } 50%{ transform:scale(1.1); } }
        .stat-value { font-size:32px; font-weight:700; color:#333; margin:10px 0; }
        .stat-label { color:#666; font-size:14px; text-transform:uppercase; letter-spacing:1px; }

        /* List Items */
        .list-group-item {
            background: rgba(255,255,255,0.95);
            border:none;
            border-radius:15px;
            margin-bottom:15px;
            padding:20px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            animation: fadeInUp 0.6s ease-out;
        }
        .list-group-item:hover { transform:translateX(10px); box-shadow:0 8px 25px rgba(0,0,0,0.15); }

        /* Buttons */
        .btn { border:none; padding:8px 20px; border-radius:8px; font-weight:600; transition: all 0.3s ease; position:relative; overflow:hidden; }
        .btn:hover { transform:translateY(-2px); box-shadow:0 5px 15px rgba(0,0,0,0.2); }

        /* Responsive */
        @media(max-width:768px){
            .sidebar{width:100%;height:auto;position:relative;}
            .content{margin-left:0;width:100%;padding:20px;}
            .stats-container{grid-template-columns:1fr;}
        }
    </style>
</head>
<body>

    <!-- Animated Background -->
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin Panel</h4>
        </div>
        <a href="#" class="menu-link active" data-section="dashboard"><i class="fas fa-home"></i> Dashboard</a>
        <a href="#" class="menu-link" data-section="blogs"><i class="fas fa-blog"></i> Manage Blogs</a>
        <a href="#" class="menu-link" data-section="users"><i class="fas fa-users"></i> Manage Users</a>
        <a href="#" class="menu-link" data-section="settings"><i class="fas fa-cog"></i> Settings</a>
        <a href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Dashboard -->
        <div id="dashboard" class="section active">
            <div class="dashboard-card welcome-section">
                <h2>Welcome, Sangeetha! 👋</h2>
                <p style="font-size:18px;opacity:0.95;">Here you can manage your blog page as Admin</p>
            </div>
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
                    <div class="stat-value">24</div>
                    <div class="stat-label">Total Blogs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-value">156</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-eye"></i></div>
                    <div class="stat-value">8.5K</div>
                    <div class="stat-label">Total Views</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-comments"></i></div>
                    <div class="stat-value">342</div>
                    <div class="stat-label">Comments</div>
                </div>
            </div>
        </div>

        <!-- Blogs Section -->
        <div id="blogs" class="section">
            <h3 class="section-header"><i class="fas fa-blog"></i> Manage Blogs</h3>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Getting Started with Laravel</h5>
                        <small class="text-muted">Published on Jan 15, 2025</small>
                    </div>
                    <div>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Publish</button>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-pause"></i> Unpublish</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">Modern Web Design Trends</h5>
                        <small class="text-muted">Published on Jan 10, 2025</small>
                    </div>
                    <div>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Publish</button>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-pause"></i> Unpublish</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Users Section -->
        <div id="users" class="section">
            <h3 class="section-header"><i class="fas fa-users"></i> Manage Users</h3>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">John Doe</h5>
                        <small class="text-muted">john@example.com • Active since Jan 2025</small>
                    </div>
                    <div>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Restrict Access</button>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Grant Access</button>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Settings Section -->
        <div id="settings" class="section">
            <h3 class="section-header"><i class="fas fa-cog"></i> Settings</h3>
            <div class="dashboard-card">
                <form>
                    <div class="mb-4">
                        <label for="siteName" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="siteName" value="My Awesome Blog">
                    </div>
                    <div class="mb-4">
                        <label for="adminEmail" class="form-label">Admin Email</label>
                        <input type="email" class="form-control" id="adminEmail" value="admin@blog.com">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Save Settings</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Section Switching Script -->
    <script>
        const menuLinks = document.querySelectorAll('.menu-link');
        const sections = document.querySelectorAll('.section');

        menuLinks.forEach(link => {
            // Only handle links with data-section
            if(link.dataset.section){
                link.addEventListener('click', e => {
                    e.preventDefault();
                    // Remove active from all links
                    menuLinks.forEach(l => l.classList.remove('active'));
                    link.classList.add('active');
                    // Hide all sections
                    sections.forEach(section => section.classList.remove('active'));
                    // Show target section
                    const target = link.getAttribute('data-section');
                    const section = document.getElementById(target);
                    if(section) section.classList.add('active');
                });
            }
        });
    </script>
</body>
</html>
