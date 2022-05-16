<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Product::all();
       return view('admin.product',$result);
    }

    public function manage_product(Request $request, $id=''){
if($id>0){

          $arr = Product::where(['id'=>$id])->get();
          $result['category_id'] = $arr['0']->category_id;
          $result['name'] = $arr['0']->name;
          $result['image'] = $arr['0']->image;
          $result['slug'] = $arr['0']->slug;
          $result['brand'] = $arr['0']->brand;
          $result['model'] = $arr['0']->model;
          $result['short_desc'] = $arr['0']->short_desc;
          $result['desc'] = $arr['0']->desc;
          $result['keywords'] = $arr['0']->keywords;
          $result['technical_specification'] = $arr['0']->technical_specification;
          $result['uses'] = $arr['0']->uses;
          $result['warranty'] = $arr['0']->warranty;

          $result['id'] = $arr['0']->id;


}else{

$result['name'] = '';
$result['image'] = '';
$result['slug'] = '';
$result['brand'] = '';
$result['model'] = '';
$result['short_desc'] = '';
$result['desc'] = '';
$result['keywords'] = '';
$result['technical_specification'] = '';
$result['uses'] = '';
$result['warranty'] = '';
$result['id'] = 0;

}

        return view('admin.manage_product',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product Deleted Sucessfully');
        return redirect()->route('admin.product');

    }
    public function status(Request $request,$status)

    {
        $product = Product::find($request->id);
        $product->status= $status;
        $product->save();
        session()->flash('message','Product Status Updated Sucessfully');
        return redirect()->route('admin.product');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_product_process(Request $request)
    {
     $request->validate([
'name' => 'required',
'slug' => 'required|unique:products,slug,'.$request->post('id'),
]);

if($request->post('id')>0){
    $product = Product::find($request->post('id'));
    $msg = "Product Update Sucessfully";

}else{
    $product = new Product();
    $msg = "Product Added Sucessfully";
}

$product->name = $request->post('name');
$product->slug = $request->post('slug');
$product->brand = $request->post('brand');
$product->model = $request->post('model');
$product->short_desc = $request->post('short_desc');
$product->desc = $request->post('desc');
$product->keywords = $request->post('keywords');
$product->technical_specification = $request->post('technical_specification');
$product->uses = $request->post('uses');
$product->warranty = $request->post('warranty');



$product->status = 1;
$product->save();
$request->session()->flash('message',$msg);

return redirect('admin/product');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */
    
}
