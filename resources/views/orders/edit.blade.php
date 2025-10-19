<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Order #'.$order->id) }}
        </h2>
    </x-slot>

    <div class="py-8" 
         x-data="editOrderForm({{ $products }}, {{ $order->items->map(fn($item) => [
            'id' => $item->product->id,
            'name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity
        ]) }})">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form id="editOrderForm" method="POST" action="{{ route('orders.update', $order) }}">
                    @csrf
                    @method('PUT')

                    <!-- Cliente -->
                    <div class="mb-4">
                        <x-input-label for="customer_id" :value="__('Customer')" />
                        <select id="customer_id" name="customer_id" class="block mt-1 w-full dark:bg-gray-800">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha de entrega -->
                    <div class="mb-4">
                        <x-input-label for="delivery_date" :value="__('Delivery Date')" />
                        <x-text-input id="delivery_date" type="date" name="delivery_date"
                            class="block mt-1 w-full dark:bg-gray-800"
                            value="{{ $order->delivery_date }}" required />
                    </div>

                    <!-- Checkboxes -->
                    <div class="flex gap-4 mb-4">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="paid" x-model="paid" :checked="{{ $order->paid ? 'true' : 'false' }}">
                            <span>Paid</span>
                        </label>                      
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="with_delivery" x-model="with_delivery" :checked="{{ $order->with_delivery ? 'true' : 'false' }}">
                            <span>With Delivery</span>
                        </label>
                    </div>

                    <!-- Productos -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-lg font-semibold">Products</h3>
                            <button type="button" @click="showModal = true"
                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                + Add Product
                            </button>
                        </div>

                        <template x-if="selectedProducts.length === 0">
                            <p class="text-gray-400 text-center">No products yet.</p>
                        </template>

                        <template x-for="(product, index) in selectedProducts" :key="product.id">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span class="font-medium" x-text="product.name"></span>
                                <div class="flex items-center gap-2">
                                    <button type="button" @click="decreaseQty(product)">−</button>
                                    <span x-text="product.quantity"></span>
                                    <button type="button" @click="increaseQty(product)">+</button>
                                    <span class="text-sm text-gray-400">$<span x-text="(product.price * product.quantity).toFixed(2)"></span></span>
                                    <button type="button" class="text-red-500" @click="removeProduct(index)">x</button>
                                </div>
                            </div>
                        </template>

                        <!-- Hidden inputs -->
                        <template x-for="product in selectedProducts" :key="product.id">
                            <div>
                                <input type="hidden" name="products[]" :value="product.id">
                                <input type="hidden" name="quantities[]" :value="product.quantity">
                            </div>
                        </template>
                    </div>

                    <!-- Total -->
                    <div class="mb-4 text-right">
                        <strong>Total:</strong> $<span x-text="total.toFixed(2)"></span>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button type="button" @click="submitForm">Update Order</x-primary-button>
                    </div>
                     <div x-show="showWarning" class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">                
                            Falta agregar productos antes de actualizar el pedido.
                        </div>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" class="fixed inset-0 bg-gray-900/60 flex justify-center items-center z-50" x-cloak>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-lg font-semibold">Add Product</h3>
                    <button @click="showModal = false" class="text-gray-500 hover:text-gray-800">✕</button>
                </div>

                <!-- Search -->
                <input type="text" x-model="searchQuery" placeholder="Search product..."
                       class="w-full mb-3 border rounded px-2 py-1 dark:bg-gray-700">

                <div class="max-h-60 overflow-y-auto">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div class="flex justify-between items-center py-2 border-b">
                            <div>
                                <span class="font-medium" x-text="product.name"></span>
                                <span class="text-gray-400 text-sm ml-2">$<span x-text="product.price"></span></span>
                            </div>
                            <button type="button" @click="addProduct(product)"
                                class="text-blue-600 hover:text-blue-800">Add</button>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        function editOrderForm(allProducts, existingItems) {
            return {
                allProducts,
                selectedProducts: existingItems,
                searchQuery: '',
                showModal: false,
                paid: {{$order->paid ? 'true' : 'false'}}, // estado actual del paid del pedido
                with_delivery: {{$order->with_delivery ? 'true': ' false'}}, // estado actual del with_delivery del pedido
                showWarning: false,

                get total() {
                    return this.selectedProducts.reduce((sum, p) => sum + (p.price * p.quantity), 0);
                },

                get filteredProducts() {
                    if (!this.searchQuery) return this.allProducts;
                    return this.allProducts.filter(p => p.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
                },

                addProduct(product) {
                    const existing = this.selectedProducts.find(p => p.id === product.id);
                    if (existing) {
                        existing.quantity++;
                    } else {
                        this.selectedProducts.push({ ...product, quantity: 1 });
                    }
                    this.showModal = false;
                    this.searchQuery = '';
                },
                 submitForm(event) {
                        if (this.selectedProducts.length === 0) {
                            this.showWarning = true;
                            setTimeout(() => this.showWarning = false, 3000);
                            return;
                        }
                        // Si hay productos se envia el formulario
                        document.getElementById('editOrderForm').submit();
                    },

                removeProduct(index) {
                    this.selectedProducts.splice(index, 1);
                },

                increaseQty(product) {
                    product.quantity++;
                },

                decreaseQty(product) {
                    if (product.quantity > 1) product.quantity--;
                }
            }
        }
    </script>
</x-app-layout>
