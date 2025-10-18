<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <!-- Customer -->
                        <div>
                            <x-input-label for="customer_id" :value="__('Customer')" />
                            <select id="customer_id" class="block mt-1 w-full dark:bg-gray-800  " name="customer_id" required>
                                <option value="" disabled selected>Select a customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
                        </div>

                        <!-- Products -->
                        <div class="mt-4">
                            <x-input-label for="products" :value="__('Products')" />
                            <select id="products" class="block mt-1 w-full" name="products[]" multiple required>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ (collect(old('products'))->contains($product->id)) ? 'selected':'' }}>
                                        {{ $product->name }} - ${{ $product->price }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('products')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create Order') }}
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
