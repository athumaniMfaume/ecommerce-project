<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\pdf;
use App\Mail\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
public function sendMessage(Request $request)
{
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'message' => 'required|string',
    ]);



    // Send the email
Mail::to($validated['email'])->send(new MessageSent(
    $validated['name'],
    $validated['email'],
    $validated['phone'],
    $validated['message']
));

    // Return a success message or redirect
    toastr()->timeOut(10000)->closeButton()->addSuccess('Email has been sent successfully');
    return redirect()->back();
}

    public function view_category()
    {   
        $data= Category::paginate(3);
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {

        $request->validate([
           
            'category_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfuly');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Delete Successfuly');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {

        $request->validate([
           
            'category' => 'sometimes|regex:/^[a-zA-Z\s]+$/|max:255',
            
        ]);
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Update Successfuly');
        return redirect('/view_category');

    }

    public function add_product(Request $request)
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'price' => 'required | numeric',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'quantity' => 'required | numeric',
            'category' => 'required',
        ]);
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfuly');
        return redirect()->back();
    }

    public function view_product()
    {   
        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Delete Successfuly');
        return redirect()->back();
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page',compact('data','category'));

    }

    public function edit_product(Request $request, $id)
    {

         $request->validate([
            'title' => 'sometimes|regex:/^[a-zA-Z\s]+$/|max:255',
            'price' => 'sometimes | numeric',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'sometimes|regex:/^[a-zA-Z\s]+$/|max:255',
            'quantity' => 'sometimes | numeric',
            'category' => 'sometimes',
        ]);




        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Update Successfuly');
        return redirect('/view_product');
        }

    public function product_search(Request $request)
    {
        $request->validate([
            'search' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        ]);
        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->
                   orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));

    }

    public function view_order()
    {   
        $datas = Order::paginate(5);
        return view('admin.order', compact('datas'));
    }

    public function order_search(Request $request)
    {
        $request->validate([
            'search' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
        ]);
        $search = $request->search;
        $datas = Order::where('name','LIKE','%'.$search.'%')->
                   orWhere('rec_address','LIKE','%'.$search.'%')->
                   orWhere('phone','LIKE','%'.$search.'%')
                   ->paginate(5);
        return view('admin.order',compact('datas'));

    }

     public function on_the_way($id)
    {   
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        return redirect('/view_order');
    }

    public function delivered($id)
    {   
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_order');
    }

    public function print_pdf($id)
     {   
       $data = Order::find($id);
       $imagePath = public_path('images/' . $data->product->image);
    
       // Generate the filename: CustomerName_Invoice.pdf
       $fileName = str_replace(' ', '_', $data->name) . '_Invoice.pdf';

       // Generate the PDF
       $pdf = Pdf::loadView('admin.invoice', compact('data', 'imagePath'));

       // Return the PDF as a download with the custom filename
       return $pdf->download($fileName);
    }


    


}
