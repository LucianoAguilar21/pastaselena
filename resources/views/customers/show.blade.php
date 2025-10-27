<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer') .' ' }}: {{ $customer->name }}
            </h2>
           <button class="">
                <a href="{{route('customers.edit', $customer)}}" class="mt-6 px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-600" >Edit</a>                    
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Name:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $customer->name }}</span></p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Email:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $customer->email ? $customer->email : 'Sin asignar'  }}</span></p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Phone:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $customer->phone ? $customer->phone : 'Sin asignar' }}</span></p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Address:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $customer->address ?  $customer->address : 'Sin asignar' }}</span></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
