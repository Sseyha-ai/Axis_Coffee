<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('order.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
    //

    public function processOrder(Request $request, $type)
    {
        $items = $request->input('items'); // or $request->items
        // Validate and store $items...

        //return response()->json(['success' => true, 'message' => 'Order submitted successfully!']);
        $summary = [];
        foreach ($items as $key => $item) {
            $summary[] = [
                'name' => $item['name'],
                'price' => $item['price'],
                'size' => $item['size'],
                'sugar' => $item['sugar'],
                'discount' => $item['discount'],
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Order submitted successfully!',
            'summary' => $summary,
        ]);

        //     try {
        //         // Validate the request
        //         $request->validate([
        //             'items' => 'required|json'
        //         ]);

        //         // Decode the items
        //         $items = json_decode($request->items, true);

        //         if (empty($items)) {
        //             return response()->json([
        //                 'success' => false,
        //                 'message' => 'No items in the order'
        //             ]);
        //         }

        //         // Calculate totals
        //         $total = 0;
        //         foreach ($items as $item) {
        //             $total += $item['price'] * $item['quantity'];
        //         }

        //         // Create the order
        //         $order = Order::create([
        //             'total_amount' => $total,
        //             'status' => $type === 'save' ? 'saved' : 'completed',
        //             // Add other necessary fields
        //         ]);

        //         // Create order items
        //         foreach ($items as $key => $itemData) {
        //             OrderItem::create([
        //                 'order_id' => $order->id,
        //                 'product_id' => explode('-', $key)[0], // Extract product ID from key
        //                 'size' => $itemData['size'],
        //                 'sugar_percentage' => $itemData['sugar'],
        //                 'discount_percentage' => $itemData['discount'],
        //                 'unit_price' => $itemData['price'],
        //                 'quantity' => $itemData['quantity'],
        //                 'subtotal' => $itemData['price'] * $itemData['quantity']
        //             ]);
        //         }

        //         return response()->json([
        //             'success' => true,
        //             'message' => 'Order ' . ($type === 'save' ? 'saved' : 'completed') . ' successfully!'
        //         ]);
        //     } catch (\Exception $e) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Error: ' . $e->getMessage()
        //         ]);
        //     }
    }
}
