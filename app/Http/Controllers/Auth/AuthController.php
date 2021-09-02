<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(Category $cat, Product $product, Comment $comment, Users $users){
		$this->cat          = $cat;
        $this->product      = $product;
        $this->comment      = $comment;
        $this->users        = $users;
    }
    public function signup(){
        $itemCart          = $this->product->getCart();
        $countCart         = count($itemCart);
        $itemsCat          = $this->cat->getItem();
        return view('auth.signup',compact('itemsCat','itemCart','countCart'));
    }
    public function postSignup(AuthRequest $request){
        $username = $request->username;
        $password = bcrypt($request->password);
        $fullname = $request->fullname;
        $data = [ 'email' => $username, 'password' => $password, 'name' => $fullname, 'active' => 0, 'wrong' => 0, 'remember_token' => ''];
        $result = $this->users->addItem($data);
        if($result){
            return redirect()->route('auth.login');
        }
        else{
            return redirect()->route('auth.signup')->with("msg","Lỗi. Vui lòng thử lại.");
        }
    }

    public function login(){
        $itemCart          = $this->product->getCart();
        $countCart         = count($itemCart);
        $itemsCat          = $this->cat->getItem();
        return view('auth.login',compact('itemsCat','itemCart','countCart'));
    }
	public function postLogin(AuthRequest $request){
        $username = $request->username;
        $password = $request->password;
		if(Auth::attempt(['email' => $username, 'password' => $password, 'active' =>0])){
            $user = Auth::user()->email;
            $data = ['wrong' => 0];
            $result = $this->users->getUsername($username,$data);
            if(($user == 'admin@gmail.com') || ($user == 'mod@gmail.com') || ($user == 'vinaenter')){
                return redirect()->route('admin.index');
            }
			else{
                return redirect()->route('shop.index');
            }
		}else{
            $wrong = 0;
            $array = $this->users->getUser();
            foreach ($array as $value){
                if($value->email == $username){
                    $wrong = $value->wrong + 1;
                }
            }
            $data = ['wrong' => $wrong];
            if($wrong != 0){
                if($wrong > 3){
                    $data = ['active' => 1];
                    $result = $this->users->getUsername($username,$data);
                    return redirect()->route('auth.login')->with('msg',"Tài khoản của bạn đã bị khóa");
                }else{
                    $result = $this->users->getUsername($username,$data);
                    return redirect()->route('auth.login')->with('msg',"Sai username hoặc password lần $wrong")->with('msg1',"Tài khoản của bạn sẽ bị khóa khi nhập sai quá 3 lần !!!");
                }
            }else{
                return redirect()->route('auth.login')->with('msg',"Username không tồn tại");
            }
			
		}
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('shop.index');
	}

    public function logoutAdmin(){
        if(Auth::user()->username == 'admin'){
            return redirect()->route('shop.index');
        }else{
            Auth::logout();
            return redirect()->route('shop.index');
        }
	}
}
