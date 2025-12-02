<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #212529;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            text-decoration: none;
            padding: 12px 20px;
            transition: background 0.3s;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #dc3545;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
            width: 100%;
        }
        .section {
            display: none;
        }
        .section.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center text-danger mb-4">Admin Panel</h4>
        <a href="#" class="menu-link active" data-section="dashboard">🏠 Dashboard</a>
        <a href="#" class="menu-link" data-section="blogs">📃 Manage Blogs</a>
        <a href="#" class="menu-link" data-section="users">👥 Manage Users</a>
       <a href="#" class="menu-link" data-section="settings">⚙️ Settings</a>
        <a href="{{ route('admin.logout') }}">🚪 Logout</a>
    </div>

    <div class="content">
        
        <div id="dashboard" class="section active">
            <h2 class="text-danger">Welcome, Sangeetha</h2>
            <p>Here you can manage your blog page as Admin</p>
        </div>

        
        <div id="blogs" class="section">
            <h3 class="text-danger">Manage Blogs</h3>
            <ul class="list-group mt-3">
                <li class="list-group-item d-flex justify-content-between">
                    Blog Title 1
                    <div>
                        <button class="btn btn-success btn-sm">Publish</button>
                        <button class="btn btn-warning btn-sm">Unpublish</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    Blog Title 2
                    <div>
                        <button class="btn btn-success btn-sm">Publish</button>
                        <button class="btn btn-warning btn-sm">Unpublish</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </li>
            </ul>
        </div>

        
        <div id="users" class="section">
            <h3 class="text-danger">Manage Users</h3>
            <ul class="list-group mt-3">
                <li class="list-group-item d-flex justify-content-between">
                    User A
                    <div>
                        <button class="btn btn-danger btn-sm">Restrict Access</button>
                        <button class="btn btn-success btn-sm">Grant Access</button>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    User B
                    <div>
                        <button class="btn btn-danger btn-sm">Restrict Access</button>
                        <button class="btn btn-success btn-sm">Grant Access</button>
                    </div>
                </li>
            </ul>
        </div>


        <div id="settings" class="section">
            <h3 class="text-danger">Settings</h3>
            <p>Configure admin preferences and permissions here.</p>
        </div>
    </div>

    <script>
        const menuLinks = document.querySelectorAll('.menu-link');
        const sections = document.querySelectorAll('.section');

        menuLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();

                
                menuLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');

            
                sections.forEach(section => section.classList.remove('active'));

                
                const target = link.getAttribute('data-section');
                document.getElementById(target).classList.add('active');
            });
        });
    </script>
</body>
</html>
