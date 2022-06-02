<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
       return view('admin.category',$result);
    }

    public function manage_category(Request $request, $id=''){
if($id>0){

          $arr = Category::where(['id'=>$id])->get();
          $result['name'] = $arr['0']->name;
          $result['slug'] = $arr['0']->slug;
          $result['parent_category_id'] = $arr['0']->parent_category_id;
          $result['category_image'] = $arr['0']->category_image;
          $result['is_home'] = $arr['0']->is_home;
          $result['is_home_selected'] ="";
          if($arr['0']->is_home == 1){
            $result['is_home_selected'] = "checked";
          }
          $result['id'] = $arr['0']->id;
          $result['category'] = DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();

}else{

$result['name'] = '';
$result['slug'] = '';
$result['parent_category_id'] = '';
$result['category_image'] = '';
$result['is_home'] = '';
$result['is_home_selected'] = '';
$result['id'] = 0;
$result['category'] = DB::table('categories')->where(['status'=>1])->get();
}


        return view('admin.manage_category',$result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)

    {
        $category = Category::find($id);
        if (!is_null($category)) {
            if (Storage::exists('/public/media/'. $category->category_image)) {
                Storage::delete('/public/media/'. $category->category_image);
            }
            $category->delete();
        }


        session()->flash('message','Category Deleted Sucessfully');
        return redirect()->route('admin.category');

    }
    public function status(Request $request,$status)

    {
        $category = Category::find($request->id);
        $category->status= $status;
        $category->save();
        session()->flash('message','Category Status Updated Sucessfully');
        return redirect()->route('admin.category');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_category_process(Request $request)
    {
     $request->validate([
'name' => 'required',
'slug' => 'required|unique:categories,slug,'.$request->post('id'),
]);

if($request->post('id')>0){
    $category = Category::find($request->post('id'));
    $msg = "Category Update Sucessfully";

}else{
    $category = new Category();
    $msg = "Category Added Sucessfully";
}

$category->name = $request->post('name');
$category->slug = $request->post('slug');
$category->is_home = 0;
if($request->post('is_home')!== null){
$category->is_home = 1;
}

$category->parent_category_id = $request->post('parent_category_id');
$category->status = 1;
if($request->hasFile('category_image')){
    $image = $request->file('category_image');
    $ext = $image->extension();
    $image_name = time().'.'.$ext;
    $image -> storeAs('/public/media', $image_name);
    $category->category_image = $image_name;
}
$category->save();
$request->session()->flash('message',$msg);

return redirect('admin/category');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
