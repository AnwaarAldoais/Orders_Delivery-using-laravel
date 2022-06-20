<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Customer;
use App\Order_Detail;
use App\Meal;
use Carbon\Carbon;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
use auth;
use DB;

class ProductController extends Controller
{
    public function index()
    {


        $offers = DB::select(DB::raw("SELECT discounts.meal_id,discounts.price,meals.name,meals.description,meals.img FROM discounts JOIN meals ON discounts.meal_id=meals.id WHERE CURDATE() >= discounts.startDate  AND CURDATE() <= discounts.endDate;"));
       
        $restaurants = User::where('type', '=', 'Restaurant')
            ->where('status', '=', 1)
            ->get();

        return view('Index.index', compact('restaurants', 'offers'));
    }

    public function categoriesShow($id)
    {
        $offers = DB::table('meals')
            ->join('discounts', 'discounts.meal_id', '=', 'meals.id')
            ->select('discounts.meal_id', 'discounts.price', 'meals.name', 'meals.description', 'meals.img')
            ->where('user_id', '=', $id)
            ->where('startDate', '<=', Carbon::now())
            ->where('endDate', '>=', Carbon::now())
            ->get();
        $categories = Category::where('user_id', '=', $id)->get();
        return view('Index.categories', compact('categories', 'offers'));
    }

    public function mealsShow($id)
    {
        $meals = Meal::where('category_id', '=', $id)->get();
        return view('Index.mealsShow', compact('meals'));
    }

    public function mealDetails($id)
    {
        $meal = Meal::find($id);
        return view('Index.mealDetails', compact('meal'));
    }

    public function mealDiscount($id)
    {
        $meal = DB::table('meals')
            ->join('discounts', 'discounts.meal_id', '=', 'meals.id')
            ->where('discounts.meal_id', '=', $id)
            ->select('meals.id', 'discounts.price', 'meals.name', 'meals.description', 'meals.img')
            ->first();
        return view('Index.mealDetails', compact('meal'));
    }

    public function addToCart(Request  $request, $id, $price)
    {
        $product = Meal::find($id);
        $product->price = $price;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->mealQty);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('Index.shoppingCart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('Index.shoppingCart', ['products' => $cart->items, 'price' => $cart->totalPrice]);
    }

    public function getOrderNow()
    {
        if (!Session::has('cart')) {
            return view('Index.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('Index.customerForm', ['total' => $total]);
    }

    public function postOrderNow(Request $request)
    {
        if (!Session::has('cart')) {
            return view('Index.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();

            $order = new order();
            $order->customer_id = $customer->id;
            $order->totalprice = $cart->totalPrice;
            $order->status = 'بانتظار الموصل';
            $order->delivery_id = 0;
            $order->save();

            $orderItems = [];
            foreach ($cart->items as $ItemId => $item) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'meal_id' => $item['item']['id'],
                    'meal_qty' => $item['qty']
                ];
            }
            Order_Detail::insert($orderItems);
        } catch (\Exception $e) {
            return view('Index.customerForm')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        //$request->session()->flash('success', 'products Successfully had purchased ');
        return view('Index.customerProfile', compact('order'));
    }

    public function orderDetails($id)
    {
        $details = DB::table('meals')
            ->join('order_details', 'order_details.meal_id', '=', 'meals.id')
            ->where('order_details.order_id', '=', $id)
            ->select('order_details.meal_id', 'meals.name', 'order_details.meal_qty')
            ->get();
        return view('ControlPanel/restaurant/category.orderDetails', compact('details'));
    }

    public function cancelOrder()
    {
        if (!Session::has('cart')) {
            return view('Index.shoppingCart');
        }
        Session::forget('cart');
        return redirect()->back();
    }
}
