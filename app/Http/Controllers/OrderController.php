<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function render()
    {
        return view('orders.index');
    }

    public function index()
    {
        $orders = DB::table('orders')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                ->select([
                    'total_amount as quantity * price',
                    'users.name',
                    'order.status'
                ]);
        return Datatables::of($orders)->make();
    }

    public function searchDateRange(Request $request)
    {
        try {
                $orders = Order::whereDate('created_at',Carbon::parse($request->date))
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                                ->select([
                                    'total_amount as quantity * price',
                                    'users.name',
                                    'order.status'
                                ]);
            return Datatables::of($orders)->make();
        }catch (Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    //not sure if it going to work...
    public function searchOrderByCustomerName(Request $request)
    {
        try {
            $orders = User::with('products')
                        ->where('name', 'LIKE', "%{$request->name}%")->get();
            return Datatables::of($orders)->make();
        }catch (Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    public function show($id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }
}
