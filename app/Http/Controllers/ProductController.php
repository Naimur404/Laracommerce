<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
          $result['productAttrArr'] = DB::table('product_arts')->where(['product_id'=>$id])->get();

}else{

$result['name'] = '';
$result['image'] = '';
$result['category_id'] = '';
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
$result['productAttrArr'][0]['product_id'] ='';
$result['productAttrArr'][0]['attr_image'] ='';
$result['productAttrArr'][0]['sku'] ='';
$result['productAttrArr'][0]['mrp'] ='';
$result['productAttrArr'][0]['price'] ='';
$result['productAttrArr'][0]['qty'] ='';
$result['productAttrArr'][0]['size_id'] ='';
$result['productAttrArr'][0]['color_id'] ='';

}

    $result['category'] = DB::table('categories')->where(['status'=>1])->get();
    $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
    $result['color'] = DB::table('colors')->where(['status'=>1])->get();



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
    public function product_arrt_delete( $paid,$pid)

    {
        DB::table('product_arts')->where(['id'=> $paid])->delete();

return redirect('admin/manage_product/'.$pid);


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


        if($request->post('id')>0){
           $image_validate = "mimes:png,jpg,jpeg";

        }else{
            $image_validate = "required|mimes:png,jpg,jpeg";
        }
     $request->validate([
'name' => 'required',
'image' => $image_validate,
'slug' => 'required|unique:products,slug,'.$request->post('id'),
]);

if($request->post('id')>0){
    $product = Product::find($request->post('id'));
    $msg = "Product Update Sucessfully";

}else{
    $product = new Product();
    $msg = "Product Added Sucessfully";
}
if($request->hasFile('image')){
    $image = $request->file('image');
    $ext = $image->extension();
    $image_name = time().'.'.$ext;
    $image -> storeAs('/public/media', $image_name);
    $product->image = $image_name;
}

$product->name = $request->post('name');
$product->category_id = $request->post('category_id');
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
$pid = $product->id;
/**
 * product attr start
 */
$SkuArr = $request->post('sku');
$mrpArr = $request->post('mrp');
$priceArr = $request->post('price');
$qtyArr = $request->post('qty');
$sizeArr = $request->post('size_id');
$colorArr = $request->post('color_id');
foreach($SkuArr as $key=>$val){
    $productAttrArr['product_id'] = $pid;
    $productAttrArr['sku'] = $SkuArr[$key];
    $productAttrArr['attr_image'] = 'test';
   $productAttrArr['mrp'] = $mrpArr[$key];
    $productAttrArr['price'] = $priceArr[$key];
    $productAttrArr['qty'] = $qtyArr[$key];
    if($sizeArr[$key] == ''){
        $productAttrArr['size_id'] = 0;
    }else{
        $productAttrArr['size_id'] = $sizeArr[$key];
    }
    if($colorArr[$key] == ''){
        $productAttrArr['color_id'] = 0;
    }else{
        $productAttrArr['color_id'] = $colorArr[$key];
    }



    DB::table('product_arts')->insert($productAttrArr);
}

 //product attr end
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
