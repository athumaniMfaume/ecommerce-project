<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {   
        $data= Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {

        $request->validate([
           
            'category_name' => 'required',
            
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        //toastr()->closeButton()->closeButton(5000)->addInfo('Category Added Successfuly');
       // toastr()->closeButton()->closeButton(5000)->addError('Category Added Successfuly');
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfuly');
        //toastr()->closeButton()->addWarning('Category Added Successfuly');
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
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Update Successfuly');
        return redirect('/view_category');

    }

    public function add_product(Request $request)
    {
        $category = Category::all();
       // $category->category_name = $request->category;
        //$category->save();
        //toastr()->closeButton()->closeButton(5000)->addInfo('Category Added Successfuly');
       // toastr()->closeButton()->closeButton(5000)->addError('Category Added Successfuly');
       // toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfuly');
        //toastr()->closeButton()->addWarning('Category Added Successfuly');
       // return redirect()->back();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'description' => 'required',
            'quantity' => 'required',
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
        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->
                   orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));

    }

    public function view_order()
    {   
        $data = Order::all();
        return view('admin.order', compact('data'));
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
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

    


}
