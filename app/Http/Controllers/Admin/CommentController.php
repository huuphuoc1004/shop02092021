<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(Comment $comment, Product $product){
        $this->comment = $comment;
        $this->product = $product;
    }
    public function index(){
        $items = $this->comment->getItem();
        return view('admin.comment.index',compact('items'));
    }
    public function postIndex(Request $request){
		$active = $request->active;
		$comment_id = $request->cmt_id;
		if($active == "Active") $act = 1;
		else $act = 0;
		$data = ['activeStar' => $act];
		$activeItems = $this->comment->editItem($data,$comment_id);
		$items = $this->comment->getItem();
		return view('admin.comment.index', compact('items'));
	}
	
	public function add(){
        $url = url()->current();
        $items = $this->product->getProducts();
		return view('admin.comment.add',compact('url','items'));
	}
	public function postAdd(Request $request){
		$comment = $request->comment;
        $rating = $request->rating;
        $cname  = $request->cname;
		$data = ['comment' => $comment,'id' => 6,'rating' => $rating, 'pid' => $cname, 'activeStar' => 0];
		$result = $this->comment->addItem($data);
		if($result){
			return redirect()->route('admin.comment.index')->with("msg","Thêm thành công");;
		}
		else{
			return redirect()->route('admin.comment.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		}
	}
	public function edit($id){
		$url = url()->current();
		$productAll	= $this->product->getProducts();
		$product   	= $this->comment->getIdSlug($id);
		return view('admin.comment.edit',compact('id','productAll','product','url'));
	}
	public function postEdit(Request $request, $id){
		$comment = $request->comment;
        $rating = $request->rating;
        $cname  = $request->cname;
		$data = ['comment' => $comment,'rating' => $rating, 'pid' => $cname];
		$result = $this->comment->editItem($data, $id);
		if($result){
			return redirect()->route('admin.comment.index')->with("msg","Đã sửa thành công");
		}
		else{
			return redirect()->route('admin.comment.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		}
	}
	public function del($id){
		$result = $this->comment->delItem($id);
		return redirect()->route('admin.comment.index')->with("msg","Đã xóa thành công");
	}
	
	public function search(Request $request){
		$url = url()->current();
		$search = $request->search;
		$items = $this->comment->searchItem($search);
		$count = count($items);
		return view('admin.comment.search',compact('items','url', 'count'));
	}
}
