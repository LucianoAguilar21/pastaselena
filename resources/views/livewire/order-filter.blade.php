<div>

<div class="space-y-4" x-data>
    <div class="flex items-center space-x-2">
        <label for="date" class="font-semibold">Filtrar por fecha de entrega:</label>
        <input 
            type="date" 
            id="date" 
            wire:model="date" 
            class="border border-gray-300 rounded-md px-2 py-1"
        >
    </div>

    <h2 class="text-lg font-semibold">
        Pedidos para el día: {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}
    </h2>

    {{$date}}

    <div id="orders-container">
        @forelse ($orders as $order)
            <div class="border border-gray-300 rounded-lg p-4 mb-4">
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                <p><strong>Customer Name:</strong> {{ $order->customer->name }}</p>
                <p><strong>Delivery Date:</strong> {{ $order->delivery_date }}</p>
                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline">Detalles</a>
            </div>
        @empty
            <p class="text-gray-500">No hay pedidos para esta fecha.</p>
        @endforelse
    </div>
</div>
    
</div>