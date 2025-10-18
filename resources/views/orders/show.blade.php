<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order: ') . $order->id }}
        </h2>
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
            </div>
        </div>
    </div>
</x-app-layout>
