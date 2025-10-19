<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Order #'.$order->id) }}
        </h2>
    </x-slot>

    <div class="py-8" x-data="editOrderForm({{ $products }}, {{ $order->items->map(fn($item) => [
        'id' => $item->product->id,
        'name' => $item->product->name,
        'price' => $item->product->price,
        'quantity' => $item->quantity
    ]) }})">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form method="POST" action="{{ route('orders.update', $order) }}">
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
                            value="{{ $order->delivery_date}}" required />
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
                        <h3 class="text-lg font-semibold mb-2">Products</h3>

                        <template x-if="selectedProducts.length === 0">
                            <p class="text-gray-400 text-center">No products yet.</p>
                        </template>

                        <template x-for="(product, index) in selectedProducts" :key="product.id">
                            <div class="flex justify-between items-center py-2 border-b">
                                <span x-text="product.name"></span>
                                <div class="flex items-center gap-2">
                                    <button type="button" @click="product.quantity--" :disabled="product.quantity <= 1">-</button>
                                    <span x-text="product.quantity"></span>
                                    <button type="button" @click="product.quantity++">+</button>
                                    <button type="button" class="text-red-500" @click="removeProduct(index)">x</button>
                                </div>
                            </div>
                        </template>

                        <!-- Inputs ocultos -->
                        <template x-for="product in selectedProducts" :key="product.id">
                            <div>
                                <input type="hidden" name="products[]" :value="product.id">
                                <input type="hidden" name="quantities[]" :value="product.quantity">
                            </div>
                        </template>
                    </div>

                    <!-- Total -->
                    <div class="mb-4">
                        <strong>Total:</strong> $<span x-text="total.toFixed(2)"></span>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Update Order</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function editOrderForm(allProducts, existingItems) {
            return {
                allProducts: allProducts,
                selectedProducts: existingItems,
                paid: {{$order->paid}}, // estado actual del paid del pedido
                with_delivery: {{$order->with_delivery}}, // estado actual del with_delivery del pedido

                get total() {
                    return this.selectedProducts.reduce((sum, p) => sum + (p.price * p.quantity), 0);
                },

                removeProduct(index) {
                    this.selectedProducts.splice(index, 1);
                },

                addProduct(product) {
                    const existing = this.selectedProducts.find(p => p.id === product.id);
                    if (existing) {
                        existing.quantity++;
                    } else {
                        this.selectedProducts.push({ ...product, quantity: 1 });
                    }
                }
            }
        }
    </script>
</x-app-layout>
