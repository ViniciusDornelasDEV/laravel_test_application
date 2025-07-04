<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-100 to-blue-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 space-y-8">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logoMenu.png') }}" alt="Logo" class="h-16">
        </div>
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Login</h2>

        @if($errorMessage)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-center">
                {{ $errorMessage }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <label for="email" class="block text-gray-600 font-medium mb-1">E-mail</label>
                <input wire:model.defer="email" type="email" id="email" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300" autocomplete="username">
                @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="password" class="block text-gray-600 font-medium mb-1">Senha</label>
                <input wire:model.defer="password" type="password" id="password" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300" autocomplete="current-password">
                @error('password') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center text-sm text-gray-600">
                    <input type="checkbox" wire:model="remember" class="mr-2 rounded">
                    Lembrar-me
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Esqueceu a senha?</a>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-bold transition-colors">Entrar</button>
        </form>
    </div>
</div>
