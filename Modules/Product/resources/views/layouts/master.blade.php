<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Product Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite CSS --}}
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">

    {{-- HEADER --}}
    <header class="bg-gray-900 text-white sticky top-0 z-50 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                {{-- Esquerda: logo + menu --}}
                <div class="flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <img src="{{ Vite::asset('resources/images/logoMenu.png') }}" alt="Logo" class="h-20">
                    </a>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center space-x-1 hover:text-gray-300 focus:outline-none">
                            <span>Cadastros</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute left-0 mt-2 w-56 bg-gray-800 text-white border border-gray-700 rounded-md shadow-lg z-50">
                            <a href="{{ route('categories.index') }}" class="block px-4 py-2 hover:bg-gray-700">Categoria de Produto</a>
                            <a href="{{ route('products.index') }}" class="block px-4 py-2 hover:bg-gray-700">Produto</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center space-x-1 hover:text-gray-300 focus:outline-none">
                            <span>Caixa</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute left-0 mt-2 w-56 bg-gray-800 text-white border border-gray-700 rounded-md shadow-lg z-50">
                            <a href="{{ route('products.index') }}"
                               class="block px-4 py-2 hover:bg-gray-700">Teste</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center space-x-1 hover:text-gray-300 focus:outline-none">
                            <span>Configurações</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute left-0 mt-2 w-56 bg-gray-800 text-white border border-gray-700 rounded-md shadow-lg z-50">
                            <a href="{{ route('products.index') }}"
                               class="block px-4 py-2 hover:bg-gray-700">Teste</a>
                            <a href="#"
                               class="block px-4 py-2 hover:bg-gray-700">Teste</a>
                        </div>
                    </div>

                </div>

                {{-- Direita: Avatar + sair --}}
                <div x-data="{ userMenu: false }" class="relative">
                    <button @click="userMenu = !userMenu" class="flex items-center space-x-2 focus:outline-none">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Usuário') }}"
                             alt="Avatar" class="w-8 h-8 rounded-full">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>
                    <div x-show="userMenu" @click.away="userMenu = false" x-transition
                         class="absolute right-0 mt-2 w-48 bg-gray-800 text-white border border-gray-700 rounded-md shadow-lg z-50">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-700">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- CONTEÚDO --}}
    <main class="py-6">
        {{ $slot }}
    </main>

    {{-- JS --}}
    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
