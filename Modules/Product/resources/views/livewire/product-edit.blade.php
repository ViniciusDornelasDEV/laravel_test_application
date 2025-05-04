<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="name" class="block font-medium">Nome</label>
            <input type="text" id="name" wire:model="product.name" class="w-full border rounded px-3 py-2">
            @error('product.name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="order" class="block font-medium">Ordem</label>
            <input type="number" id="order" wire:model="product.order" class="w-full border rounded px-3 py-2">
            @error('product.order') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center">
            <input type="checkbox" id="active" wire:model="product.active" class="mr-2">
            <label for="active">Ativo</label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar
        </button>
    </form>
</div>
