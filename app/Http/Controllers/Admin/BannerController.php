<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Banner::all();
       return view('admin.banner',$result);
    }

    public function manage_banner(Request $request, $id=''){
if($id>0){

          $arr = Banner::where(['id'=>$id])->get();
          $result['name'] = $arr['0']->name;
          $result['image'] = $arr['0']->image;
          $result['btn_text'] = $arr['0']->btn_text;
          $result['btn_link'] = $arr['0']->btn_link;


          $result['id'] = $arr['0']->id;


}else{

$result['name'] = '';
$result['image'] = '';
$result['btn_text'] = '';
 $result['btn_link'] ='';
$result['id'] = 0;

}

        return view('admin.manage_banner',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $banner = Banner::find($id);
        if (!is_null($banner)) {
            if (Storage::exists('/public/media/'. $banner->image)) {
                Storage::delete('/public/media/'. $banner->image);
            }
            $banner->delete();
        }

        session()->flash('message','Category Deleted Sucessfully');
        return redirect()->route('admin.banner');

    }
    public function status(Request $request,$status)

    {
        $banner = Banner::find($request->id);
        $banner->status= $status;
        $banner->save();
        session()->flash('message','Banner Status Updated Sucessfully');
        return redirect()->route('admin.banner');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_banner_process(Request $request)
    {
     $request->validate([
'name' => 'required',
'image' => 'mimes:png,jpg,jpeg'
]);

if($request->post('id')>0){
    $banner = Banner::find($request->post('id'));
    $msg = "Category Update Sucessfully";

}else{
    $banner = new Banner();
    $msg = "Category Added Sucessfully";
}

$banner->name = $request->post('name');
$banner->btn_text = $request->post('btn_text');
$banner->btn_link = $request->post('btn_link');
$banner->status = 1;


if($request->hasFile('image')){
    $image = $request->file('image');
    $ext = $image->extension();
    $image_name = time().'.'.$ext;
    $image -> storeAs('/public/media', $image_name);
    $banner->image = $image_name;
}
$banner->save();
$request->session()->flash('message',$msg);

return redirect('admin/banner');






    }
}
