<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order: ') . $order->id }}
            </h2>
            <button class="">
                <a href="{{route('orders.edit', $order)}}" class="mt-6 px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-600" >Edit</a>                    
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <p>Customer: {{ $order->customer->name }}</p>
                    <p>Created by: {{ $order->user->name }}</p>
                    <p>Total Amount: {{ $order->total_amount }}</p>
                    <p>Status: {{ $order->status }}</p>
                    <p>Delivery Date: {{ $order->delivery_date }}</p>
                    <p>Paid: {{ $order->paid ? 'Yes' : 'No' }}</p>
                    <p>With Delivery: {{ $order->with_delivery ? 'Yes' : 'No' }}</p>

                    <h3 class="mt-4 font-semibold text-lg">Items:</h3>
                    <ul class="list-disc list-inside">
                        @foreach ($order->items as $item)
                            <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: {{ $item->sub_total }}</li>
                        @endforeach
                    </ul>

                  
                    
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
