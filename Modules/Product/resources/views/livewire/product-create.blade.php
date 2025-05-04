<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Cadastrar Produto</h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block">Nome:</label>
            <input type="text" wire:model.defer="name" class="border rounded w-full p-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Ordem:</label>
            <input type="number" wire:model.defer="order" class="border rounded w-full p-2">
            @error('order') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" wire:model.defer="active" class="mr-2">
                Ativo
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Salvar
        </button>
    </form>
</div>
