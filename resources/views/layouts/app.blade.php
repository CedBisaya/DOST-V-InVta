<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'InVta') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow h-screen flex flex-col">
        <div class="p-4 text-2xl font-bold flex items-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 mr-2">
            InVta
        </div>
        <nav class="flex-1 px-4 py-6">
            <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-blue-100 {{ request()->routeIs('dashboard') ? 'bg-blue-200' : '' }}">Dashboard</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-100">Event Manager</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-100">Reports</a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-blue-100">Logs</a>
        </nav>
        <div class="p-4 border-t">
            <a href="{{ route('logout') }}" class="block py-2 px-3 text-red-600">Sign Out</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <header class="flex justify-between items-center mb-6">
            <div>{{ now()->format('l, F d, Y h:i A') }}</div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs px-1">1</span>
                    <button><i class="fas fa-bell"></i></button>
                </div>
                <div>{{ auth()->user()->name }} <span class="text-sm text-gray-500">{{ auth()->user()->role ?? 'Admin' }}</span></div>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>