<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Comment;
use App\Models\DiscountCode;
use App\Models\DiscountUser;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct(Category $cat, Product $product, Comment $comment, 
                                Users $users, CartProduct $cartProduct, 
                                DiscountCode $discount_code, DiscountUser $discount_user){
		$this->cat              = $cat;
        $this->product          = $product;
        $this->comment          = $comment;
        $this->users            = $users;
        $this->cartproduct      = $cartProduct;
        $this->discount_code    = $discount_code;  
        $this->discount_user    = $discount_user;     
    } 
    public function index(){
        $itemsCat           = $this->cat->getItem();
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id                = Auth::user()->id;
            $itemCart              = $this->cartproduct->getItem($user_id);
            $countCart            = count($itemCart);
        }
        $items             = $this->product->getItem();
        $item              = $this->product->getItem();
        $itemSeller        = $this->product->getProductSeller();
        $itemSale          = $this->product->getProductSale();
        return view('shop.index',compact('items','item','itemsCat','itemSeller',
                                        'itemSale','itemCart','countCart'));
    }
    public function cat($slug, $id){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat           = $this->cat->getItem();
        $items              = $this->product->getCatItem($id);
        $itemCatname        = $this->cat->getCat($id);
        $cname              = $itemCatname->cname;
        $itemCat            = $this->product->getItemCat($id);
       return view('shop.cat',compact('items','itemCat','id','cname','itemsCat','itemCart','countCart'));
   }
    public function detail($slug, $id){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat           = $this->cat->getItem();
        $itemProduct        = $this->product->getProduct($id);
        $cid                = $itemProduct->cid;
        $itemAlsoProduct    = $this->product->getAlsoProduct($cid, $id);
        $itemComment        = $this->comment->getItems($id);

        $comments 		    = $this->comment->getStarActive($id);
        $commentProduct  	= $comments;
		$dem            = 0;
		$sumRating      = 0;
		foreach($comments as $comment){
				$sumRating += $comment->rating;
				++$dem;
        }
		if($dem == 0){
			$rate = 0;
		}else{
			$rate   	= round($sumRating/$dem,1);
        }
        $rating 	= floor($rate * 20);
		$dataRate  	= ['star' => $rate];
		$this->product->editItem($dataRate,$id);
        return view('shop.product',compact('itemProduct', 'itemAlsoProduct','itemsCat',
                                            'itemCart','countCart','id','itemComment',
                                            'commentProduct','rate','rating','dem' ));
    }

    public function postDetail($slug, $id, Request $request){
        $rating            = $request->rating;
        $comment            = $request->comment;
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat           = $this->cat->getItem();
        $itemProduct        = $this->product->getProduct($id);
        $cid                = $itemProduct->cid;
        $itemAlsoProduct    = $this->product->getAlsoProduct($cid, $id);
        $itemComment        = $this->comment->getItems($id);

        $active = "0";
		$arr = array('ngu','óc','cút', 'dm');
		$dem = 0;
		foreach ($arr as $value){
			if (strpos($comment,$value) !== false){
				$dem++;
			}
        }
        if($dem > 0){
            $username = Auth::user()->username;
			$data = ['comment' => $comment, 'pid'=>$id, 'activeStar'=>1,'rating'=> $rating, 'id'=>$user_id];
			$this->comment->addItem($data);
			
			$data2 = ['activeStar' => 1];
			$this->comment->getDeActive($data2, $user_id);

			return redirect()->route('shop.product',[$slug,$id])->with("msg","Tài khoản {$username} đã bị khóa.");
		}else{
			$data = ['comment' => $comment, 'pid'=>$id, 'activeStar'=>$active ,'rating'=> $rating, 'id'=>$user_id];
			$this->comment->addItem($data);
	
            $comments 		    = $this->comment->getStarActive($id);
            $commentProduct  	= $comments;
			$dem            = 0;
			$sumRating      = 0;
			foreach($comments as $comments){
					$sumRating += $comments->rating;
					++$dem;
			}
			if($dem == 0){
				$rate = 0;
			}else{
				$rate   	= round($sumRating/$dem,1);
			}
			$rating 	= floor($rate * 20);
			$dataRate  	= ['star' => $rate];
			$this->product->editItem($dataRate,$id);		
        }
        
        return view('shop.product',compact('itemProduct', 'itemAlsoProduct','itemsCat',
                                            'itemCart','countCart','id','itemComment',
                                            'commentProduct','rate','rating','dem' ));
    }

    public function addtobag(Request $request){
        $id         =  Auth::user()->id;
        $pid        = $request->id;
        if(isset($request->quantity)){
            $quantity   = $request->quantity;
        }
        else{
            $quantity = 1;
        }
        $array         = $this->cartproduct->getItemProduct($pid);
        $dem = 0;
        foreach ($array as $value){ 
            if(($value->pid == $pid) && ($value->id == $id)){
                $quantity = $value->quantity + $quantity;
                $data = ['quantity'=>$quantity];
                $dem++;
            }
        }
        if($dem != 0){
            $result = $this->cartproduct->editItem($data,$pid,$id);
        }
        else{
            $data       = ['id'=> $id, 'pid'=>$pid, 'quantity'=>$quantity];
            $result = $this->cartproduct->addItem($data);
        }
		if($result){
			return redirect()->route('shop.cart');
		}
		else{
			return redirect()->route('shop.product')->with("msg","Lỗi. Vui lòng thử lại.");
		}
    }
    public function delProduct($cpid){
		$result = $this->cartproduct->delItem($cpid);
		return redirect()->route('shop.cart')->with("msg","Đã xóa thành công");
	}

    public function cart(){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat           = $this->cat->getItem();
        return view('shop.cart',compact('itemCart','itemsCat','itemCart','countCart'));
    }
    public function discount_code(Request $request){
        $itemCode           = $this->discount_code->getItem();
        $discount_price     = 0;
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $code = $request->code;
        $dem = 0;
        foreach($itemCode as $value){
            if($code == $value->code){
                $id_code = $value->id_code;
                $discount_price = $value->discount_code;
                $code_count = $value->code_count;
                $dem++;
            }
        }
        if($dem == 0){
            return redirect()->back()->with('msgFail','Mã giảm giá không chính xác');
        }
        else
        {
            if($code_count < 1){
                return redirect()->back()->with('msgFail','Mã giảm giá đã hết');
            }
            else{
                $itemDiscountUser = $this->discount_user->getItem($id, $id_code);
                $countDiscount = count($itemDiscountUser);
                if($countDiscount > 0){
                    return redirect()->back()->with('msgFail','Mã giảm giá đã được sử dụng');
                }
                
                else{
                    $dataCode = ['code_count' => ($code_count - 1)];
                    $this->discount_code->editItem($dataCode, $id_code);
                    $data  = ['id'=> $id, 'username'=> $email,'id_code'=>$id_code,'code'=>$code];
                    $this->discount_user->addItem($data);
                    if(Auth::check())
                    {
                        $user_id            = Auth::user()->id;
                        $itemCart           = $this->cartproduct->getItem($user_id);
                        $countCart          = count($itemCart);
                    }
                    $itemsCat           = $this->cat->getItem();
                    return view('shop.cart',compact('itemCart','itemsCat','itemCode','countCart',
                                                    'discount_price'))->with('msgSuccess', 'Áp mã thành công');
                }
            }
            
        }
    }
    public function about(){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat           = $this->cat->getItem();
        return view('shop.about',compact('itemsCat','itemCart','countCart'));
    }
    public function error(){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat       = $this->cat->getItem();
        return view('shop.error',compact('itemsCat','itemCart','countCart'));
    }
    public function contact(){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat          = $this->cat->getItem();
        return view('shop.contact',compact('itemsCat','itemCart','countCart'));
    }
    public function blog(){
        $itemCart           = $this->product->getCart();
        $countCart          = count($itemCart);
        if(Auth::check()){
            $user_id            = Auth::user()->id;
            $itemCart           = $this->cartproduct->getItem($user_id);
            $countCart          = count($itemCart);
        }
        $itemsCat       = $this->cat->getItem();
        return view('shop.blog',compact('itemsCat','itemCart','countCart'));
    }
}
