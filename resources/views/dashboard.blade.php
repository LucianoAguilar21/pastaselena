

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">     
                                
                <form id="filter-form" class="mb-4">
                    <label for="date" class="font-semibold">Filtrar por fecha de entrega:</label>
                    <input 
                        type="date" 
                        id="date" 
                        name="date" 
                        value="{{ now()->toDateString() }}" 
                        class="border border-gray-300 rounded-md px-2 py-1"
                    >
                </form>

            

                <div id="orders-container">
                    @forelse ($orders as $order)
                   
                        <div class="border border-gray-300 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-center">
                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline">Detalles</a>
                            </div>
                                <p><strong>Customer Name:</strong> {{ $order->customer->name }}</p>
                                <p><strong>Delivery Date:</strong> {{ $order->delivery_date }}</p>
                                <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                          
                            
                        </div>
            
                    @empty
                        <p class="text-gray-500">No hay pedidos para esta fecha.</p>
                    @endforelse
                </div>

                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('date').addEventListener('change', function() {
    const date = this.value;
    

    fetch(`{{ route('dashboard') }}?date=${date}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(html => {
        // Extraemos solo el contenido del contenedor de pedidos
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newOrders = doc.querySelector('#orders-container').innerHTML;

        // ser reemplaza el contenido sin recargar la página
        document.getElementById('orders-container').innerHTML = newOrders;
   
    })
    .catch(error => console.error(error));
});


</script>
</x-app-layout>