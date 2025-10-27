<?php

namespace App\Livewire;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class OrderFilter extends Component
{
    public $date;
    public $orders = [];



    public function mount()
    {
   
        $this->date = $this->date ?? Carbon::today()->toDateString();
        
        $this->loadOrders();
    }

  
    public function updatedDate()
    {

        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->orders = Order::whereDate('delivery_date', $this->date)->get();
    }

    public function render()
    {
        return view('livewire.order-filter');
    }
}
