<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">            
            <div class="flex items-center">
                    <a href="{{ url()->previous() }}" class="mx-6 text-black p-2 rounded dark:text-white hover:underline font-bold">{{__('Back')}}</a> 
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Order: ') . $order->id }}       
                    </h2>
            </div>
            <button class="">
                <a href="{{route('orders.edit', $order)}}" class="mt-6 px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-600" >Edit</a>                    
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="lg:flex lg:justify-between lg:items-center">
                        <p class="mx-2"> <strong class="bg-gray-800 text-white rounded p-1">Customer:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $order->customer->name }}</span></p>
                        <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Created by:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $order->user->name }} </span></p>
                    </div>
                    @if ($order->with_delivery)
                        <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Delivery Address:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $order->customer->address ? $order->customer->address : 'Sin asignar'  }}</span></p>                                            
                        
                    @endif
                    
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Status:</strong>
                        @if ($order->status == 'new')
                            <span class="bg-blue-400 rounded p-1 border font-semibold text-white">
                                {{ $order->status }}
                            </span>    
                        @endif
                        @if ($order->status == 'preparing')
                            <span class="bg-yellow-400 rounded p-1 border font-semibold text-white">
                                {{ $order->status }}
                            </span>    
                        @endif
                        @if ($order->status == 'completed')
                            <span class="bg-green-400 rounded p-1 border font-semibold text-white">
                                {{ $order->status }}
                            </span>    
                        @endif
                        @if ($order->status == 'cancelled')
                            <span class="bg-red-400 rounded p-1 border font-semibold text-white">
                                {{ $order->status }}
                            </span>    
                        @endif
                         @if ($order->status == 'ready')
                            <span class="bg-orange-400 rounded p-1 border font-semibold text-white">
                                {{ $order->status }}
                            </span>    
                        @endif
                    </p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Delivery Date:</strong> <span class="bg-gray-100 rounded p-1 border">{{ $order->delivery_date }}</span></p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> Paid:</strong> 
                        <span class="{{ $order->paid ? 'bg-green-300 rounded p-1 border font-semibold text-gray-700' : 'bg-red-300 rounded p-1 border font-bold text-gray-700' }} ">
                            {{ $order->paid ? 'Yes' : 'No' }}
                        </span>
                    </p>
                    <p class="m-2"> <strong class="bg-gray-800 text-white rounded p-1"> With Delivery: </strong>
                         <span class="{{ $order->with_delivery ? 'bg-green-300 rounded p-1 border font-bold text-gray-700' : 'bg-red-300 rounded p-1 border font-bold text-gray-700 ' }}">
                            {{ $order->with_delivery ? 'Yes' : 'No' }}
                        </span>
                    </p>
                    <p class=" mx-2 text-lg "> <strong class="bg-gray-800 text-white rounded p-1"> Total Amount:</strong> <span class="bg-gray-100 rounded p-1 border">${{ $order->total_amount }}</span></p>

                    <h3 class="mt-4 font-semibold text-lg">Items:</h3>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Unit price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @if ($order->items->isEmpty())
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                            No items found for this order.
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($order->items as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->product->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        ${{ number_format($item->product->price, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ number_format($item->sub_total, 2) }}
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>


                  
                    
                </div>
                @if (session('success'))
                    <div 
                        x-data="{ show: true }"
                        x-init="setTimeout(() => show = false, 3000)"
                        x-show="show"
                        x-transition
                        class="fixed top-5 right-5 bg-green-500 text-white px-4 py-3 rounded-lg shadow-lg z-50 flex items-center space-x-2"
                    >
                        <!-- Icono -->
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 13l4 4L19 7" />
                        </svg>

                        <!-- Mensaje -->
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
