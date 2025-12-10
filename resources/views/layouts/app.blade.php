<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Todo App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="w-full">
        <div class="bg-[#007bff] w-full p-4">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <h1 class="text-white text-2xl font-bold">Todo Application</h1>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('todos.index') }}" class="text-white hover:underline">My Todos</a>
                            <a href="{{ route('todos.create') }}" class="text-white hover:underline">Create Todo</a>
                            <span class="text-white">{{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:underline bg-transparent border-none cursor-pointer">Logout</button>
                            </form>
                        @endauth
                        @guest
                            <a href="{{ route('login') }}" class="text-white hover:underline">Login</a>
                            <a href="{{ route('register') }}" class="text-white hover:underline">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-4">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
