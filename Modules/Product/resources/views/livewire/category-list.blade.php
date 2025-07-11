<div class="max-w-6xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Categorias de Produtos</h1>
        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition-colors">
            <i data-lucide="circle-plus" class="w-4 h-4 mr-2"></i>
            Nova Categoria
        </a>
    </div>
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-md rounded">
        <table class="min-w-full text-sm divide-y divide-gray-200">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">ID</th>
                    <th class="px-4 py-3 text-left font-medium">Nome</th>
                    <th class="px-4 py-3 text-left font-medium">Ordem</th>
                    <th class="px-4 py-3 text-left font-medium">Ativo</th>
                    <th class="px-4 py-3 text-left font-medium">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-800">
                @forelse($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $category->id }}</td>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->order }}</td>
                        <td class="px-4 py-2">
                            @if ($category->active)
                                <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Sim</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs bg-red-100 text-red-800 rounded">Não</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2 flex items-center">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800">
                                <i data-lucide="square-pen" class="w-5 h-5"></i>
                            </a>
                            <button
                                wire:click="deleteCategory({{ $category->id }})"
                                wire:confirm="Tem certeza que deseja deletar?"
                                class="text-red-600 hover:text-red-800">
                                <i data-lucide="trash" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">
                            Nenhuma categoria cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $categories->links('vendor.pagination.tailwind') }}
    </div>
</div>
