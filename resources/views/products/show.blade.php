<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ url()->previous() }}" class="mx-6 text-black p-2 rounded dark:text-white hover:underline font-bold">{{__('Back')}}</a> 
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product') .' :' }} {{ $product->name }}        
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="m-2"><strong class="bg-gray-800 text-white rounded p-1">Product Name:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $product->name }}</span></p>
                    <p class="m-2"><strong class="bg-gray-800 text-white rounded p-1">Price:</strong> <span class="bg-gray-100 rounded p-1 border">${{ number_format($product->price, 2) }}</span></p>

                    <p class="m-2"><strong class="bg-gray-800 text-white rounded p-1"> Fecha de creación:</strong> <span class="bg-gray-100 rounded p-1 border">{{$product->created_at}}</span></p>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
