<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product, Category $cat){
        $this->product = $product;
        $this->cat = $cat;
	}
	
	//ADMIN
    public function index(){
        $items = $this->product->getItem();
        return view('admin.product.index',compact('items'));
    }

    public function add(){
		$url = url()->current();
		$items = $this->cat->getItem();
		return view('admin.product.add',compact('items','url'));
	}
	public function postAdd(ProductRequest $request){
		$path           = $request->file('hinhanh')->store('publics/files');
		$explodePath    = explode("/", $path);
 		$picture 	    = end($explodePath);
 		$name           = $request->name;
 		$description    = $request->description;
		$type           = $request->type;
        $price          = $request->price;
        $discount       = $request->discount;

		$data = ['pname' => $name,'description' => $description, 'picture' => $picture,
				'cid' => $type, 'picture'=> $picture, 'price'=>$price, 'discount'=>$discount, 'cart'=> 0, 'star' => 0];
		$result = $this->product->addItem($data);
		if($result){
			return redirect()->route('admin.product.index')->with("msg","Thêm thành công");
		}
		else{
			return redirect()->route('admin.product.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		} 
	}
	public function edit($id){
		$url        = url()->current();
        $product    = $this->product->getIdSlug($id);
        $cid        = $product->cid;
        $items      = $this->cat->getItemCat($cid);
		return view('admin.product.edit',compact('id','product','items','url'));
	}
	public function postEdit(Request $request, $id){
        $picture        = $request->file('hinhanh');
 		$name           = $request->name;
 		$description    = $request->description;
		$type           = $request->type;
        $price          = $request->price;
        $discount       = $request->discount;
		if($picture == ""){
            $data = ['pname' => $name,'description' => $description,'cid' => $type, 
                    'price'=>$price, 'discount'=>$discount, 'cart'=> 0, 'star'=> 0 ];
		}else{
			$path = $request->file('hinhanh')->store('public/files');
			$explodePath = explode("/", $path);
			$picture 	 = end($explodePath);
			$data = ['pname' => $name,'description' => $description, 'picture' => $picture,
                'cid' => $type, 'price'=>$price, 'discount'=>$discount, 'cart'=> 0, 'star'=> 0 ];
		}
		$result = $this->product->editItem($data, $id);
		if($result){
			return redirect()->route('admin.product.index')->with("msg","Đã sửa thành công");
		}
		else{
			return redirect()->route('admin.product.index')->with("msg1","Lỗi. Vui lòng thử lại.");
		}
	}
	public function del($id){
		$result = $this->product->delItem($id);
		return redirect()->route('admin.product.index')->with("msg","Đã xóa thành công");
	}
	public function search(Request $request){
		$url = url()->current();
		$search = $request->search;
		$items = $this->product->searchItem($search);
		$count = count($items);
		return view('admin.product.search',compact('items','url','count'));
	}
}
