<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$user = User::where('usertype','user')->get()->count();
    	$product = Product::all()->count();
    	$order = Order::all()->count();
    	$delivered = Order::where('status','delivered')->get()->count();
        return view('admin.index', compact('user','product','order', 'delivered'));
    }

    public function home()
    {
    	$product = Product::latest()->paginate(4);

        if (Auth::id()) {
        	$user = Auth::user();
    	    $userid = $user->id;

    	    $count = Cart::where('user_id',$userid)->count();
        	
        }

        else{
        	
    	    $count = '';
        	
        }

    	
        return view('home.index', compact('product', 'count'));
    }

       public function why()
    {
        $product = Product::latest()->paginate(4);

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }

        else{
            
            $count = '';
            
        }

        
        return view('home.why_page', compact('product', 'count'));
    }

        public function contact()
    {
        $product = Product::latest()->paginate(4);

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }

        else{
            
            $count = '';
            
        }

        
        return view('home.contact_page', compact('product', 'count'));
    }

       public function testmonial()
    {
        $product = Product::latest()->paginate(4);

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }

        else{
            
            $count = '';
            
        }

        
        return view('home.testmonial_page', compact('product', 'count'));
    }

        public function shop()
    {
        $product = Product::latest()->paginate(8);

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }

        else{
            
            $count = '';
            
        }

        
        return view('home.shop', compact('product', 'count'));
    }

    public function login_home()
    {
    	$product = Product::paginate(4);

    	if (Auth::id()) {
        	$user = Auth::user();
    	    $userid = $user->id;

    	    $count = Cart::where('user_id',$userid)->count();
        	
        }

        else{
        	
    	    $count = '';
        	
        }

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
    	$data = Product::find($id);
    	if (Auth::id()) {
        	$user = Auth::user();
    	    $userid = $user->id;

    	    $count = Cart::where('user_id',$userid)->count();
        	
        }

        else{
        	
    	    $count = '';
        	
        }
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
    	$product_id = $id;
    	$user = Auth::user();
    	$user_id = $user->id;
    	$data = new Cart;
    	$data->user_id = $user_id;
    	$data->product_id = $product_id;
    	$data->save();
    	toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to Cart Successfuly');
        return redirect()->back();
    }

    public function mycart()
    {
    	if (Auth::id()) {
        	$user = Auth::user();
    	    $userid = $user->id;

    	    $count = Cart::where('user_id',$userid)->count();
        	
        	$carts = Cart::where('user_id',$userid)->paginate(4);
        }
        return view('home.mycart', compact('count', 'carts'));
    }

    public function delete_cart($id)
    {
    	if (Auth::id()) {
        	$user = Auth::user();
    	    $userid = $user->id;

    	    $count = Cart::where('user_id',$userid)->count();
        	
        	$cart = Cart::where('user_id',$userid)->get();
        }
    	$cart = Cart::find($id);        
        $cart->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Cart Delete Successfuly');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
    	
    	    $name = $request->name;
    	    $address = $request->address;
    	    $phone = $request->phone;

    	    $userid = Auth::user()->id;
        	
        	$cart = Cart::where('user_id',$userid)->get();

        	foreach ($cart as $carts) {
        		$order = new Order;

        		$order->name = $name;
        		$order->rec_address = $address;
        		$order->phone = $phone;
        		$order->user_id = $userid;
        		$order->product_id = $carts->product_id;
        		$order->save();
        		
        		
        	}

        	$cart_remove = Cart::where('user_id',$userid)->get();

        	foreach ($cart_remove as $remove) {
        		
                $data = Cart::find($remove->id);
        	
        		$data->delete();
        		
        		
        	}


        	return redirect()->back();
        
    }


     public function myorders()
    {

    	$user = Auth::user()->id;
    	$count = Cart::where('user_id',$user)->get()->count();
    	$orders = Order::where('user_id',$user)->paginate(4);
        return view('home.order', compact('count', 'orders'));
    }

    public function stripe()
    {

        return view('home.stripe');
    }

        public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from complete." 

        ]);

      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }
}
