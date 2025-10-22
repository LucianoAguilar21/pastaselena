<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
                            <div>
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
                                </div>
                            </div>
                            <div>
                                <a href="{{route('customers.create')}}" class="m-2 text-blue-500 hover:text-blue-700 font-semibold bg-gray-100 dark:bg-gray-700 rounded px-4 py-2">Add new user</a>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 
                                @if(session('new_customer_id') == $customer->id)
                                    animate-fadeBackground
                                @endif">
                                
                                    
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="{{URL::asset('img/unknow-customer.jpg')}}" alt="customer image">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{$customer->name}}</div>
                                            <div class="font-normal text-gray-500">{{$customer->email}}</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$customer->phone ? $customer->phone : 'N/A'}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-5 w-5  mx-2"><img src="{{URL::asset('img/address-icon.png')}}" alt="address icon"></div> 
                                            {{$customer->address ? $customer->address : 'N/A'}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
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
</x-app-layout>
