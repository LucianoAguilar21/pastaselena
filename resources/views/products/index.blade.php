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

                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200
                                 @if(session('new_product_id') == $product->id)
                                        animate-fadeBackground
                                    @endif">
                            
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            -----------
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $product->price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{route('products.show',$product)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                                        </td>
                                        
                                    </div>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
