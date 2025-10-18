<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index')->with('orders', Order::with('customer', 'user', 'items.product')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create')
            ->with('customers', Customer::all())
            ->with('products', Product::all());
                                   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'delivery_date' => 'required|date',
        'products' => 'required|array|min:1',
        'quantities' => 'required|array',

        ]);

        // dd($validated['deliver_date']);
        // dd($request->has('paid'));
    
        $order = Order::create([
            'created_by' => Auth::id(),
            'customer_id' => $validated['customer_id'],
            'status' => 'new',
            'delivery_date' => $validated['delivery_date'],
            'paid' => $request->has('paid'),
            'with_delivery' => $request->has('with_delivery'),
            'total_amount' => 0, 
        ]);

        $total = 0;

        foreach ($validated['products'] as $productId) {
            $product = Product::findOrFail($productId);
            $quantity = $validated['quantities'][$productId];
            $subTotal = $product->price * $quantity;

            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'sub_total' => $subTotal,
            ]);

            $total += $subTotal;
        }

        $order->update(['total_amount' => $total]);

        return redirect()->route('orders')->with('success', 'Order created successfully!');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show')->with('order', $order->load('customer', 'user', 'items.product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
