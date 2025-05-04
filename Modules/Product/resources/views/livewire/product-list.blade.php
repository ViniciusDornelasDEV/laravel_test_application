<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Produtos</h1>

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Nome</th>
                <th class="py-2 px-4 border">Ordem</th>
                <th class="py-2 px-4 border">Ativo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td class="py-2 px-4 border">{{ $product->id }}</td>
                    <td class="py-2 px-4 border">{{ $product->name }}</td>
                    <td class="py-2 px-4 border">{{ $product->order }}</td>
                    <td class="py-2 px-4 border">{{ $product->active ? 'Sim' : 'Não' }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:underline">Editar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-2">Nenhum produto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
