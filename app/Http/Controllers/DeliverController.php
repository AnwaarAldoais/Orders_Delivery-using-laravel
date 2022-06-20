<?php

namespace App\Http\Controllers;
Use App\Order;
use Illuminate\Http\Request;
use DB;
class DeliverController extends Controller
{

    public function waitingOrdersForDelivers()
    {
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.name','customers.phone', 'customers.address','orders.customer_id')
            ->where('orders.status','=','بانتظار الموصل')
            ->get();

        return view('ControlPanel/delivery.waitingOrdersForDelivers',compact('orders'));
    }

    public function receiveOrders($id)
    {
        $orders=Order::find($id);
        $orders->status='في انتظار العمل';
        $orders->delivery_id=auth()->id();
        $orders->save();
        return redirect()->back();
    }
    public function deliveringOrders()
    {
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.name','customers.phone', 'customers.address','orders.customer_id')
            ->where('status','=','في انتظار العمل')
            ->where('delivery_id','=',auth()->id())
            ->orwhere('status','=','بانتظار التسليم')
            ->orwhere('status','=','جاري التسليم')->get();
        return view('ControlPanel/delivery.deliveringOrder',compact('orders'));
    }

    public function waitingOrdersForRes()
    {
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('orders.*', 'customers.name','customers.phone', 'customers.address','orders.customer_id')
            ->where('status','=','في انتظار العمل')
            ->orwhere('status','=','قيد العمل')->get();
        return view('ControlPanel/restaurant/category.waitingOrder',compact('orders'));
    }

    public function changeOrderStatus($id,$status)
    {
        $order=Order::find($id);
        $order->status=$status;
        $order->save();
        return redirect()->back();
    }
}
