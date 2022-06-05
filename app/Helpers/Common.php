<?php
use Illuminate\Support\Facades\DB;


function getTopNavCat(){
    $result = DB::table('categories')->where(['status' =>1])->get();
    $arr=[];
    foreach($result as $row){
        $arr[$row->id]['name'] = $row->name;
        $arr[$row->id]['parent_category_id'] = $row->parent_category_id;

    }
    $str=buildTreeView($arr,0);
    return $str;

}
$html='';
function buildTreeView($arr,$parent,$level=0,$preLevel=-1){
         global $html;
    foreach($arr as $id=>$data){
        if($parent==$data['parent_category_id']){
            if($level>$preLevel){
                if($html==''){
                    $html.='<ul class="nav navbar-nav"><li><a href="/">Home</a></li>';
                }else{
                    $html.='<ul class="dropdown-menu">';
                }

            }
            if($level==$preLevel){
                $html.='</li>';
            }
            $html.='<li><a href="#">'.$data['name'].'<span class="caret"></span></a>';
            if($level>$preLevel){
                $preLevel=$level;
            }
            $level++;
            buildTreeView($arr,$id,$level,$preLevel);
            $level--;
        }
    }
    if($level==$preLevel){
        $html.='</li></ul>';
    }
    return $html;
}






?>
