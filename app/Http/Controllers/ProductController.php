<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_art;
use App\Models\product_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
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
          $result['lead_time'] = $arr['0']->lead_time;
          $result['tax_id'] = $arr['0']->tax_id;

          $result['is_promo'] = $arr['0']->is_promo;
          $result['is_featured'] = $arr['0']->is_featured;
          $result['is_discounted'] = $arr['0']->is_discounted;
          $result['is_tranding'] = $arr['0']->is_tranding;

          $result['id'] = $arr['0']->id;
          $result['productAttrArr'] = DB::table('product_arts')->where(['product_id'=>$id])->get();
          $productImgArr= DB::table('product_imgs')->where(['product_id'=>$id])->get();

if(!isset($productImgArr[0])){
    $result['productImgArr'][0]['images'] ='';
    $result['productImgArr'][0]['id'] ='';
}else{
    $result['productImgArr'] = $productImgArr;
}
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
$result['lead_time'] = '';
$result['tax_id'] ='' ;

$result['is_promo'] = '';
$result['is_featured'] = '';
$result['is_discounted'] ='' ;
$result['is_tranding'] ='' ;

$result['id'] = 0;
$result['productAttrArr'][0]['id'] ='';
$result['productAttrArr'][0]['product_id'] ='';
$result['productAttrArr'][0]['attr_image'] ='';
$result['productAttrArr'][0]['sku'] ='';
$result['productAttrArr'][0]['mrp'] ='';
$result['productAttrArr'][0]['price'] ='';
$result['productAttrArr'][0]['qty'] ='';
$result['productAttrArr'][0]['size_id'] ='';
$result['productAttrArr'][0]['color_id'] ='';
$result['productImgArr'][0]['images'] ='';
$result['productImgArr'][0]['id'] ='';

}

    $result['category'] = DB::table('categories')->where(['status'=>1])->get();
    $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
    $result['color'] = DB::table('colors')->where(['status'=>1])->get();
    $result['brands'] = DB::table('brands')->where(['status'=>1])->get();

    $result['tax'] = DB::table('taxes')->where(['status'=>1])->get();

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
        if (!is_null($product)) {
            if (Storage::exists('/public/media/'. $product->image)) {
                Storage::delete('/public/media/'. $product->image);
            }
            $product->delete();
        }

        session()->flash('message','Product Deleted Sucessfully');
        return redirect()->route('admin.product');

    }
    public function product_arrt_delete( $paid,$pid)

    {
       $product_attr = Product_art::find($paid);
       if (!is_null($product_attr)) {
        if (Storage::exists('/public/media/'. $product_attr->attr_image)) {
            Storage::delete('/public/media/'. $product_attr->attr_image);
        }
        $product_attr->delete();
    }

return redirect('admin/manage_product/'.$pid);


    }
    public function product_image_delete($piid,$pid)

    {
        $product_image_attr = product_img::find($piid);
        if (!is_null($product_image_attr)) {
         if (Storage::exists('/public/media/'. $product_image_attr->images)) {
             Storage::delete('/public/media/'. $product_image_attr->images);
         }
        DB::table('product_imgs')->where(['id'=> $piid])->delete();
        }
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
//attr_image.* using for array input
'attr_image.*' => 'mimes:png,jpg,jpeg',
'images.*' => 'mimes:png,jpg,jpeg',

]);
       $paidArr = $request->post('paid');
       $SkuArr = $request->post('sku');
       $mrpArr = $request->post('mrp');
       $priceArr = $request->post('price');
       $qtyArr = $request->post('qty');
       $sizeArr = $request->post('size_id');
       $colorArr = $request->post('color_id');
       foreach($SkuArr as $key=>$val){

       $check = DB::table('product_arts')->where('sku','=',$SkuArr[$key])->where('id','!=',$paidArr[$key])->get();

if(isset($check[0])){
    $request->session()->flash('sku_error',$SkuArr[$key]. 'SKU Already Used');
    return redirect(request()->headers->get('referer'));
}
}

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
$product->lead_time = $request->post('lead_time');
$product->tax_id = $request->post('tax_id');

$product->is_promo = $request->post('is_promo');
$product->is_featured = $request->post('is_featured');
$product->is_discounted = $request->post('is_discounted');
$product->is_tranding = $request->post('is_tranding');



$product->status = 1;
$product->save();
$pid = $product->id;
/**
 * product attr start
 */

foreach($SkuArr as $key=>$val){

    $productAttrArr['product_id'] = $pid;
    $productAttrArr['sku'] = $SkuArr[$key];

    $productAttrArr['mrp'] = (int)$mrpArr[$key];
    $productAttrArr['price'] = (int)$priceArr[$key];
    $productAttrArr['qty'] = (int)$qtyArr[$key];


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
    if($request->hasFile("attr_image.$key")){

       $rand = rand('111111111','999999999');
       $attr_image = $request->file("attr_image.$key");
       $ext = $attr_image->extension();
       $image_name = $rand.'.'.$ext;
       $request ->File("attr_image.$key")->storeAs('/public/media', $image_name);
       $productAttrArr['attr_image'] = $image_name;

       if($paidArr[$key]!= ''){

        DB::table('product_arts')->where(['id'=>$paidArr[$key]])->update($productAttrArr);
      }else{

        DB::table('product_arts')->insert($productAttrArr);
      }
    }


}



 //product attr end

 //product images start
$piidArr = $request->post('piid');
foreach($piidArr as $key=>$val){
    $productImgArr['product_id'] = $pid;
    if($request->hasFile("images.$key")){

        $rand = rand('111111111','999999999');
        $images = $request->file("images.$key");
        $ext = $images->extension();
        $image_name = $rand.'.'.$ext;
        $request ->File("images.$key")->storeAs('/public/media', $image_name);
        $productImgArr['images'] = $image_name;
        if($piidArr[$key]!= ''){

            DB::table('product_imgs')->where(['id'=>$piidArr[$key]])->update($productImgArr);
          }else{

            DB::table('product_imgs')->insert($productImgArr);
          }
     }


}

 //product images end
$request->session()->flash('message',$msg);

return redirect('admin/product');


}
}




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\Response
     */


