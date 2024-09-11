<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use File;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderBy('orders_id')->Paginate(10);
        return view('backend/order/index', compact('order'));
    }

    public function createform()
    {
        return view('backend/order/createform');
    }

    public function edit($orders_id)
    {
        $order = Order::find($orders_id);
        $pro = Product::all();
        return view('backend/order/edit', compact('order'));
    }

    public function insert(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->product_id = $request->product_id;
        $order->amount = $request->amount;
        $order->status = $request->status;
        $order->save();
        alert()->success('Successfully Saved', 'บันทึกสำเร็จ');
        return redirect('admin/order/index');
    }

    public function update(Request $request, $orders_id)
    {
        $order = Order::find($orders_id);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->product_id = $request->product_id;
        $order->amount = $request->amount;
        $order->status = $request->status;
        $order->update();
        alert()->success('Successfully Updated', 'อัปเดทข้อมูลสำเร็จ');
        return redirect('admin/order/index');
    }

    public function delete($orders_id)
    {
        $order = Order::find($orders_id);
        $order->delete();
        alert()->success('Successfully Deleted', 'ลบข้อมูลสำเร็จ');
        return redirect('admin/order/index');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
            ]);

            // Create a new order instance
            $order = new Order();
            $order->name = $validated['name'];
            $order->phone = $validated['phone'];
            $order->address = $validated['address'];
            $order->product_id = $request->product_id;
            $order->save();

            // Return a JSON response
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Order creation failed: '.$e->getMessage());

            // Return a JSON error response
            return response()->json(['error' => 'Failed to save the order.'], 500);
        }
    }
}
