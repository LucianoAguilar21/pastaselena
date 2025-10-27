<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">             

                    <a href="{{route('orders.create')}}" class="m-2 text-blue-500 hover:text-blue-700 font-semibold bg-gray-100 dark:bg-gray-700 rounded px-4 py-2">                
                        Add new order (F9)
                    </a>

                    <div class="m-4 relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Order
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Customer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created At
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delivery Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                     <th scope="col" class="px-6 py-3">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                           
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order->id }} 
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $order->customer->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i ') }}
                                        </td>
                                        <td class="px-6 py-4">
                                             {{Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y H:i ')}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order->total_amount }} 
                                        </td>
                                        <td class="px-6 py-4">
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
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{route('orders.show',$order)}}">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
        function onKeyDownHandler(event) {

            let codigo = event.which || event.keyCode;

            if(codigo ===  120){
                location.href ="/orders/create";
            }
    

            
        }
        document.addEventListener('keydown', onKeyDownHandler);
    </script>
</x-app-layout>
