<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex items-center space-x-2">
            <li>
                <a href="{{ route('products.index') }}" class="hover:underline hover:text-blue-600 flex items-center">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>
                    Produtos
                </a>
            </li>
            <li class="text-gray-400">/</li>
            <li class="text-gray-600">
                {{ request()->routeIs('products.create') ? 'Cadastrar' : 'Editar' }}
            </li>
        </ol>
    </nav>
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar Produto</h1>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-5">
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
            <select id="category_id" wire:model.defer="product.category_id"
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
            <input type="text" id="name" wire:model="product.name"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('product.name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="order" class="block text-sm font-medium text-gray-700 mb-1">Ordem</label>
            <input type="number" id="order" wire:model="product.order"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('product.order')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" id="active" wire:model="product.active"
                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <label for="active" class="text-sm text-gray-700">Ativo</label>
        </div>

        <div class="pt-4">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                Salvar
            </button>
        </div>
    </form>
</div>
