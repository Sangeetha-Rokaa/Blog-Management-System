<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Blog Dashboard')</title>

    <!-- ✅ Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ✅ Axios for AJAX requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- ✅ Alpine.js for sidebar toggling & UI interactivity -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- 🧭 Sliding Sidebar Menu -->
    <div x-data="{ open: false }" class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-700 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform 
                    -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out"
             :class="{ '-translate-x-full': !open, 'translate-x-0': open }" id="sidebar">

            <h2 class="text-2xl font-semibold text-center mb-6">Blog Dashboard</h2>
            <nav>
                <a href="{{ url('/dashboard') }}" class="block py-2.5 px-4 hover:bg-blue-800 rounded">Home</a>
                <a href="{{ url('/about') }}" class="block py-2.5 px-4 hover:bg-blue-800 rounded">About</a>
                
                <a href="{{ url('/contact') }}" class="block py-2.5 px-4 hover:bg-blue-800 rounded">Contact Us</a>
                <a href="{{ url('/logout') }}" class="block py-2.5 px-4 hover:bg-blue-800 rounded">Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header with search bar -->
            <header class="bg-white shadow-md p-4 flex items-center justify-between">
                <button @click="open = !open" class="md:hidden text-blue-600 focus:outline-none">
                    ☰
                </button>

                <div class="w-full md:w-1/2 mx-auto">
                    <input type="text" placeholder="Search blogs..."
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-200">
                </div>
            </header>

            <!-- Categories -->
            <div class="bg-white p-3 border-b border-gray-200 flex overflow-x-auto space-x-3">
                @foreach (['Entertainment', 'Educational', 'Science', 'Food', 'Research Paper', 'Adventure'] as $category)
                    <button class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-blue-100 whitespace-nowrap">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <!-- Blog Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- ✅ Global Scripts -->
    <script>
        // Setup CSRF for Axios
        axios.defaults.headers.common['X-CSRF-TOKEN'] =
            document.querySelector('meta[name="csrf-token"]').content;

        // Example: like, comment, share buttons could go here
    </script>

    @stack('scripts')
</body>
</html>
