<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <nav class="text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex items-center space-x-2">
            <li>
                <a href="{{ route('products.index', ['category_id' => $this->product->category_id]) }}"
                   class="hover:underline hover:text-blue-600 flex items-center">
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
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        {{ request()->routeIs('products.create') ? 'Cadastrar Produto' : 'Editar Produto' }}
    </h1>
    <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-8" enctype="multipart/form-data">
        <!-- Coluna 1 -->
        <div class="space-y-5">
            <!-- Código e Nome -->
            <div class="flex gap-4">
                <div class="w-1/3">
                    <label for="code" class="block text-sm font-medium text-gray-700 mb-1">Código</label>
                    <input type="number" id="code" wire:model.defer="product.code"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('product.code')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-2/3">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                    <input type="text" id="name" wire:model.defer="product.name"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('product.name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Categoria e Ordem -->
            <div class="flex gap-4">
                <div class="w-2/3">
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                    <select id="category_id" wire:model.defer="product.category_id"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('product.category_id')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/3">
                    <label for="order" class="block text-sm font-medium text-gray-700 mb-1">Ordem</label>
                    <input type="number" id="order" wire:model.defer="product.order"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('product.order')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Valor e Status -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Valor (R$)</label>
                    <input type="text" id="price" wire:model.defer="product.price"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Ex: 12,90">
                    @error('product.price')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="active" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="active" wire:model.defer="product.active"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1">Ativo</option>
                        <option value="F">Em falta</option>
                        <option value="0">Inativo</option>
                    </select>
                    @error('product.active')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Local de venda -->
            <div>
                <span class="block text-sm font-medium text-gray-700 mb-1">Local de venda</span>
                <div class="flex flex-wrap gap-4">
                    @php $salesLocations = ['Caixa','Site','App','Ifood']; @endphp
                    @foreach($salesLocations as $location)
                        <label class="inline-flex items-center">
                            <input type="checkbox" wire:model.defer="sales_locations" value="{{ $location }}"
                                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-1">{{ $location }}</span>
                        </label>
                    @endforeach
                </div>
                @error('sales_locations')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Descrição -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <input id="x" type="hidden" name="product[description]" wire:model.defer="product.description">
                <trix-editor input="x"></trix-editor>
                @error('product.description')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- Coluna 2 (Imagem) -->
        <div class="flex flex-col items-center gap-4">
            <div class="w-full">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Foto do produto</label>
                <input type="file" id="photo" wire:model="photo"
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('photo')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="md:col-span-2 pt-6 flex justify-end">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                Salvar
            </button>
        </div>
    </form>
</div>
