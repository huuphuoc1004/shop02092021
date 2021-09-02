<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(Users $users){
        $this->users = $users;
    }
    public function index(){
        $items = $this->users->getItem();
        return view('admin.user.index',compact('items'));
    }

    public function add(){
		$url = url()->current();
		return view('admin.user.add',compact('url'));
	}
	public function postAdd(UserRequest $request){
		$username = $request->username;
		$password = bcrypt($request->password);
		$fullname = $request->fullname;
		$created_at = date('Y-m-d H:i:s');
		$updated_at = $created_at;
		$data = ['email' => $username,'password' => $password,'name' => $fullname, 'active' => 0, 
				'wrong' => 0, 'remember_token' => '','created_at'=> $created_at,'updated_at'=> $updated_at];
		$result = $this->users->addItem($data);
		if($result){
			return redirect()->route('admin.user.index')->with('msg',"Thêm thành công");;
		}
		else{
			return redirect()->route('admin.user.index')->with("msg","Lỗi. Vui lòng thử lại.");
		}
	}
	public function edit($id, Request $request){
		$url = url()->current();
		$user = $this->users->getItemFirst($id);
		if(Auth::user()->email != $user->email && Auth::user()->email != 'admin@gmail.com'){
			$request->session()->flash('msg1','Bạn không thế sửa thông tin của người khác');
			return redirect()->route('admin.user.index');
		}
		return view('admin.user.edit',compact('id','user','url'));
	}
	public function postEdit(Request $request, $id){
		$username = $request->username;
		$password = $request->password;
		$password_bcryypt = bcrypt($password);
		$fullname = $request->fullname;
		if($password == ""){
			$data = ['email' => $username,'name' => $fullname];
		}
		else{
			$data = ['email' => $username,'password'=>$password_bcryypt ,'name' => $fullname];
		}
		$result = $this->users->editItem($data, $id);
		if($result){
			return redirect()->route('admin.user.index')->with("msg","Đã sửa thành công");
		}
		else{
			return redirect()->route('admin.user.index')->with("msg","Lỗi. Vui lòng thử lại.");
		}
	}
	public function del($id, Request $request){
		$result = $this->users->delItem($id);
		return redirect()->route('admin.user.index')->with("msg","Đã xóa thành công");
	}
	
	public function search(Request $request){
		$url = url()->current();
		$search = $request->search;
		$items = $this->users->searchItem($search);
		$count = count($items);
		return view('admin.user.search',compact('items','url','count'));
	}
}
