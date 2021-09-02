<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(Category $cat){
		      $this->cat = $cat;
    }
    public function index(){
        $items = $this->cat->getItem();
        return view('admin.cat.index',compact('items'));
    }
    public function add(){
		$url = url()->current();
		return view('admin.cat.add',compact('url'));
	}
	public function postAdd(CategoryRequest $request){
		$ten = $request->ten;
		$data = ['cname'=> $ten];
		$result = $this->cat->addItem($data);
		$validated = $request->validated();
		if($result){
			return redirect()->route('admin.cat.index')->with("msg","Thêm danh mục thành công");
		}
		else{
			return redirect()->route('admin.cat.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		}
    }
    public function edit($id){
		$url = url()->current();
		$catName = $this->cat->getItems($id);
		return view('admin.cat.edit',compact('id','catName','url'));
	}
	public function postEdit(Request $request, $id){
		$ten = $request->ten;
		$data = ['cname'=> $ten];
		$result = $this->cat->editItem($data, $id);
		if($result){
			return redirect()->route('admin.cat.index')->with("msg","Đã sửa thành công");
		}
		else{
			return redirect()->route('admin.cat.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		}
    }
    public function del($id){
		$result = $this->cat->delItem($id);
		return redirect()->route('admin.cat.index')->with("msg","Đã xóa thành công");
    }
    
    public function search(Request $request){
		$search = $request->search;
		$url = url()->current();
		$items = $this->cat->searchItem($search);
		$count = count($items);
		return view('admin.cat.search',compact('items','url','count'));
	}
}
