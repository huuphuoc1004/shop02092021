<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function __construct(Category $cat, Product $product, Comment $comment, Users $users){
		$this->cat                   = $cat;
        $this->product            = $product;
        $this->comment            = $comment;
        $this->users                = $users;
    }
    public function build()
    {
        Mail::to('nguyenvanhuuphuoclapulga@gmail.com')->send(new WelcomeMail());
        return new WelcomeMail;
    }
    public function forgetPassword(){
        $itemCart          = $this->product->getCart();
        $countCart         = count($itemCart);
        $itemsCat          = $this->cat->getItem();
        return view('mail.forget_password',compact('itemsCat','itemCart','countCart'));
    }

    public function resetPassword(Request $request){
        $email              = $request->email;
        $now                = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail         = "Lấy lại mật khẩu ". $now;
        $users_email        = $this->users->getEmailRegister($email);
        foreach($users_email as $value){
            $users_id = $value->id;
        }
        if($users_email){
            $count_users = $users_email->count();
            if($count_users == 0){
                return redirect()->back()->with('error',"Email chưa được đăng ký để khôi phục");
            }
            else{
                //update token vao database
                $token_random                   = Str::random(6);
                $users_email                    = Users::find($users_id);
                $users_email->remember_token    = $token_random;
                $users_email->save();

                //send mail
                $link_reset_pass = url('/update_new_pass?email='.$email.'&token='.$token_random);

                $data = array(
                    'name' => $title_mail,
                    'body' => $link_reset_pass,
                    'email'=> $email,
                );
                Mail::send('mail.forget_pass_notify',['data'=>$data], function($message) use ($title_mail,$data){
                    $message->from('nguyenvanhuuphuoclapulga@gmail.com');
                    $message->to($data['email']);
                    $message->subject($title_mail);
                });
                return redirect()->back()->with('message','Gửi mail thành công, vui lòng check để reset mật khẩu');
            }
        }      
    }

    public function updateNewPass(Request $request){
        $itemCart          = $this->product->getCart();
        $countCart         = count($itemCart);
        $itemsCat          = $this->cat->getItem();
        return view('mail.reset_passwords',compact('itemsCat','itemCart','countCart'));
    }

    public function resetNewPass(Request $request){
        $data              = $request->all();
        $users_email = $this->users->getFindEmail($data['email'],$data['token']);
        foreach($users_email as $value){
            $users_id = $value->id;
        }
        $count_users = $users_email->count();
        if($count_users == 0){
                return redirect('forget_password')->with('errors',"Vui lòng nhập lại Email vì link đã quá hạn");
        }
        else{
                //update token vao database
            $token_random               = Str::random(6);
            $resetUser                  = Users::find($users_id);
            $resetUser->password        = bcrypt($data['password']);
            $resetUser->remember_token  = $token_random;
            $resetUser->save();
            return redirect('dangnhap')->with('message','Mật khẩu đã được cập nhật. Vui lòng đăng nhập.');
            }
        }    
}