<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    public function getItem(){
        return DB::table('users')->orderBy('id','desc')->paginate(5);
    }
    public function getItemCount(){
        return DB::table('users')->orderBy('id','asc')->get();
    }
    public function getUser(){
    	return DB::table('users')->get();
    }
    public function getEmailRegister($email){
        return DB::table('users')->where('email',$email)->get();
    }
    public function getFindEmail($email,$token){
        return DB::table('users')->where('email',$email)->where('remember_token',$token)->get();
    }
    public function getItems(){
    	return DB::table('users')->orderBy('id','desc')->paginate(5);
    }
    public function addItem($data){
    	return DB::table('users')->insert($data);
    }
    public function getUsername($username, $data){
        return DB::table('users')->where('email',$username)->update($data);
    }
    
    public function editItem($data,$id){
    	return DB::table('users')->where('id',$id)->update($data);
    }
    
    public function getItemFirst($id){
    	return $this->findOrFail($id);
    }
    public function delItem($id){
    	return DB::table('users')->where('id',$id)->delete();
    }
    public function searchItem($data){
    	return DB::table('users')
    	->where('id', 'LIKE', '%' . $data . '%')
    	->orWhere ('email', 'LIKE', '%' . $data . '%')
    	->orWhere ('name', 'LIKE', '%' . $data . '%')
    	->paginate(3);
    }
}
