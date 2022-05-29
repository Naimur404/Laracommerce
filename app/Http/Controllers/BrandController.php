<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $result['data'] = Brand::all();
       return view('admin.brand',$result);
    }

    public function manage_brand(Request $request, $id=''){
if($id>0){

          $arr = Brand::where(['id'=>$id])->get();
          $result['name'] = $arr['0']->name;
          $result['image'] = $arr['0']->image;
          $result['id'] = $arr['0']->id;


}else{

$result['name'] = '';
$result['image'] = '';
$result['id'] = 0;

}

        return view('admin.manage_brand',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            if (Storage::exists('/public/media/'. $brand->image)) {
                Storage::delete('/public/media/'. $brand->image);
            }
            $brand->delete();
        }

        session()->flash('message','Category Deleted Sucessfully');
        return redirect()->route('admin.brand');

    }
    public function status(Request $request,$status)

    {
        $brand = Brand::find($request->id);
        $brand->status= $status;
        $brand->save();
        session()->flash('message','Brand Status Updated Sucessfully');
        return redirect()->route('admin.brand');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_brand_process(Request $request)
    {
     $request->validate([
'name' => 'required|unique:brands,name,'.$request->post('id'),
'image' => 'mimes:png,jpg,jpeg'
]);

if($request->post('id')>0){
    $brand = Brand::find($request->post('id'));
    $msg = "Category Update Sucessfully";

}else{
    $brand = new Brand();
    $msg = "Category Added Sucessfully";
}

$brand->name = $request->post('name');

$brand->status = 1;


if (!is_null($request->image)) {


    $image = $request->file('image');
    $img = time() . '.' . $image->getClientOriginalExtension();
    $image->storeAs('/public/media', $img);

    $brand->image = $img;
}
$brand->save();
$request->session()->flash('message',$msg);

return redirect('admin/brand');






    }

}
