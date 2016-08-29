<?php

namespace ShopCart\Http\Controllers;
use Illuminate\Http\Request;

use ShopCart\Http\Requests;
use ShopCart\Categories;

class TreeController extends Controller
{

	public function treeView(){       
	        $Categorys = Categories::where('parent_id', '=', 0)->get();
	        $tree='<ul id="browser" class="filetree"><li class="tree-view"></li>';
	        foreach ($Categorys as $Category) {
	             $tree .='<li class="tree-view closed"<a class="tree-name">'.$Category->name.'</a>';
	             if(count($Category->childs)) {
	                $tree .=$this->childView($Category);
	            }
	        }
	        $tree .='<ul>';
	        // return $tree;
	        return view('layouts.treeview',compact('tree'));
	    }


    public function childView($Category){                 
            $html ='<ul>';
            foreach ($Category->childs as $arr) {
                if(count($arr->childs)){
                $html .='<li class="tree-view closed"><a class="tree-name">'.$arr->name.'</a>';                  
                        $html.= $this->childView($arr);
                    }else{
                        $html .='<li class="tree-view"><a class="tree-name">'.$arr->name.'</a>';                                 
                        $html .="</li>";
                    }
                                   
            }
            
            $html .="</ul>";
            return $html;
    }   


}
