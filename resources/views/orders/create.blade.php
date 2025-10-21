<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new order') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="orderForm()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form id="orderForm" method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <!-- Customer -->
                        <div class="mb-4">
                            <x-input-label for="customer_id" :value="__('Customer')" />
                            <select id="customer_id" class=" mt-1 w-full dark:bg-gray-800" name="customer_id" required>
                                <option value="" disabled selected>Select a customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Deliver date -->
                        <div class="mb-4">
                            <x-input-label for="delivery_date" :value="__('Delivery Date')" />
                            <x-text-input id="delivery_date" class="block mt-1 w-full dark:bg-gray-800"
                                type="date" name="delivery_date" required />
                           
                          
                        </div>

                        <!-- Paid & Delivery -->
                        <div class="flex items-center gap-6 mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="paid" x-model="paid" class="rounded dark:bg-gray-700" >
                                <span class="ml-2">Paid</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" name="with_delivery" x-model="with_delivery" class="rounded dark:bg-gray-700">
                                <span class="ml-2">With delivery</span>
                            </label>
                        </div>

                        <!-- Products Section -->
                        <div class="border-t border-gray-600 pt-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Products</h3>
                                <button type="button" @click="openModal = true"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                                    + Add Product
                                </button>
                            </div>

                            <!-- Selected Products Table -->
                            <template x-if="selectedProducts.length > 0">
                                <table class="w-full text-left border border-gray-700">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <th class="p-2">Product</th>
                                            <th class="p-2 text-center">Quantity</th>
                                            <th class="p-2 text-right">Subtotal</th>
                                            <th class="p-2 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="(item, index) in selectedProducts" :key="item.id">
                                            <tr class="border-t border-gray-600">
                                                <td class="p-2" x-text="item.name"></td>
                                                <td class="p-2 text-center">
                                                    <div class="flex items-center justify-center gap-2">
                                                        <button type="button" @click="decreaseQty(index)" class="px-2 py-1 text-gray-800 dark:text-white bg-gray-200 dark:bg-gray-700 rounded">-</button>
                                                        <span x-text="item.quantity"></span>
                                                        <button type="button" @click="increaseQty(index)" class="px-2 py-1 text-gray-800 dark:text-white bg-gray-200 dark:bg-gray-700 rounded">+</button>
                                                    </div>
                                                </td>
                                                <td class="p-2 text-right" x-text="formatCurrency(item.sub_total)"></td>
                                                <td class="p-2 text-center">
                                                    <button type="button" @click="removeProduct(index)" class="text-red-500 hover:text-red-700">Remove</button>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </template>

                            <template x-if="selectedProducts.length === 0">
                                <p class="text-gray-400 text-center mt-4">No products added yet.</p>
                            </template>

                            <!-- Total -->
                            <div class="mt-4 text-right text-lg font-semibold">
                                Total: <span x-text="formatCurrency(total)"></span>
                            </div>
                        </div>

                        <!-- Hidden inputs for sending product data -->
                        <template x-for="item in selectedProducts" :key="item.id">
                            <div>
                                <input type="hidden" name="products[]" :value="item.id">
                                <input type="hidden" :name="'quantities[' + item.id + ']'" :value="item.quantity">
                            </div>
                        </template>

                        <!-- Submit -->
                        <div class="flex justify-end mt-6">
                            <x-primary-button type="submit"  @click="submitForm">{{ __('Create Order') }}</x-primary-button>
                        </div>
                        <div x-show="showWarning" class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">                
                            Falta agregar productos antes de crear el pedido.
                        </div>
                    </form>
                </div>
            </div>
        </div>
       

        <!-- Product Search Modal -->
        <div x-show="openModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" x-cloak>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-4">Add Product</h3>
                <input type="text" x-model="searchQuery" placeholder="Search product..."
                    class="w-full mb-4 p-2 border dark:bg-gray-700 rounded">
                <div class="max-h-64 overflow-y-auto">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div class="flex justify-between items-center border-b py-2">
                            <span x-text="product.name + ' - $' + product.price"></span>
                            <button type="button" @click="addProduct(product)"
                                class="bg-blue-600 text-white px-3 py-1 rounded-md">Add</button>
                        </div>
                    </template>
                </div>
                <div class="text-right mt-4">
                    <button type="button" @click="openModal = false" class="text-gray-400 hover:text-gray-200">Close</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        function orderForm() {
            
            return {
                openModal: false,
                paid: false,
                with_delivery: false,
                products: @json($products), // lista de productos disponibles
                selectedProducts: [],
                searchQuery: '',
                showWarning: false,

                get filteredProducts() {
                    if (this.searchQuery === '') return this.products;
                    return this.products.filter(p => 
                        p.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                },

                addProduct(product) {
                    if (!this.selectedProducts.find(p => p.id === product.id)) {
                        this.selectedProducts.push({
                            ...product,
                            quantity: 1,
                            sub_total: parseFloat(product.price)
                        });
                    }
                    this.openModal = false;
                    this.searchQuery = '';
                },
                 submitForm(event) {                    
                        //event.preventDefault();
                        if (this.selectedProducts.length === 0) {
                            this.showWarning = true;
                            setTimeout(() => this.showWarning = false, 3000);
                            event.preventDefault();
                            return;
                        }
                        // Si hay productos se envia el formulario
                        // document.getElementById('orderForm').submit();
                    },

                increaseQty(index) {
                    this.selectedProducts[index].quantity++;
                    this.updateSubtotal(index);
                },

                decreaseQty(index) {
                    if (this.selectedProducts[index].quantity > 1) {
                        this.selectedProducts[index].quantity--;
                        this.updateSubtotal(index);
                    }
                },

                removeProduct(index) {
                    this.selectedProducts.splice(index, 1);
                },

                updateSubtotal(index) {
                    const item = this.selectedProducts[index];
                    item.sub_total = item.quantity * item.price;
                },

                get total() {
                    return this.selectedProducts.reduce((sum, item) => sum + item.sub_total, 0);
                },

                formatCurrency(value) {
                    return '$' + value.toFixed(2);
                }


            }
        }
    </script>
</x-app-layout>
