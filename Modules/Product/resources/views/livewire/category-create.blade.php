<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex items-center space-x-2">
            <li>
                <a href="{{ route('categories.index') }}" class="hover:underline hover:text-blue-600 flex items-center">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>
                    Categorias
                </a>
            </li>
            <li class="text-gray-400">/</li>
            <li class="text-gray-600">
                {{ request()->routeIs('categories.create') ? 'Cadastrar' : 'Editar' }}
            </li>
        </ol>
    </nav>
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Cadastrar Categoria</h1>
    <form wire:submit.prevent="save" class="space-y-5">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
            <input type="text" id="name" wire:model.defer="category.name"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="order" class="block text-sm font-medium text-gray-700 mb-1">Ordem</label>
            <input type="number" id="order" wire:model.defer="category.order"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('order')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select id="status" wire:model.defer="category.status"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
            @error('category.status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
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
