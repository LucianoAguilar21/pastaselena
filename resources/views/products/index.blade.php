<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">                
                    <a href="{{route('products.create')}}" class="m-2 text-blue-500 hover:text-blue-700 font-semibold bg-gray-100 dark:bg-gray-700 rounded px-4 py-2">                
                        Add new product                
                    </a>

                    <div class="m-4">
                        @foreach ($products as $product)
                            {{-- {{ $products->name }} - {{ $products->price }} <br> --}}
                            <div class="p-2 rounded-lg mb-2 
                                @if(session('new_product_id') == $product->id)
                                    animate-fadeBackground
                                @endif
                            ">
                                {{ $product->name }} - {{ $product->price }}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
