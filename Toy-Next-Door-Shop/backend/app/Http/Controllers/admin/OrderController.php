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
        $order = Order::orderBy('orders_id', direction: 'desc')->Paginate(10);
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
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'street_address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'price' => 'required|numeric',
            'product_id' => 'required|integer', // Ensure product_id is present and is an integer
            'amount' => 'required|integer',
            'slip' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048' // Adjust as needed for file types and size
        ]);

        // Build the full address
        $fullAddress = $request->street_address . ' ' . $request->city . ' ' . $request->province . ' ' . $request->postal_code;

        // Create and save the order
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $fullAddress;
        $order->price = $request->price;
        $order->product_id = $request->product_id; // Should now be set
        $order->amount = $request->amount;

        // Handle the file upload
        if ($request->hasFile('slip')) {
            $file = $request->file('slip');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Create a unique file name
            $file->move(public_path('backend/product'), $fileName); // Save to the specified directory
            $order->slip = $fileName; // Store the file name in the database
        }

        // Save the order
        $order->save();
        alert()->success('Successfully Saved', 'บันทึกสำเร็จ');
        return redirect('/');
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
            ]);

            $fullAddress = $request->street_address . ' ' . $request->city . ' ' . $request->province . ' ' . $request->postal_code;

            // Create a new order instance
            $order = new Order();
            $order->name = $validated['name'];
            $order->phone = $validated['phone'];
            $order->address = $fullAddress;
            $order->product_id = $request->product_id;
            $order->amount = $request->amount;
            $order->price = $request->price;
            $order->save();

            // Return a JSON response
            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Order creation failed: ' . $e->getMessage());

            // Return a JSON error response
            return response()->json(['error' => 'Failed to save the order.'], 500);
        }
    }

    public function track()
    {
        $order = Order::orderBy('orders_id', direction: 'desc')->Paginate(10);
        return view('frontend/track', compact('order'));
    }
}
