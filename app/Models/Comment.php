<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'cmt_id';
    public function getItem(){
        return DB::table('comment')
            ->join('product', 'comment.pid', '=', 'product.pid')
            ->join('users', 'comment.id', '=', 'users.id')
            ->orderBy('cmt_id','desc')->paginate(5);
    }
    public function getItems($id){
        return DB::table('comment')
            ->join('product', 'comment.pid', '=', 'product.pid')
            ->join('users', 'comment.id', '=', 'users.id')
            ->where('comment.pid',$id)
            ->orderBy('cmt_id','asc')->get();
    }
    public function getItemCount(){
        return DB::table('comment')
            ->join('product', 'comment.pid', '=', 'product.pid')
            ->join('users', 'comment.id', '=', 'users.id')
            ->orderBy('cmt_id','asc')->get();
    }
    public function getUser(){
    	return DB::table('comment')->get();
    }
    public function getItemProduct($id){
        return DB::table('comment')
        ->join('product', 'comment.pid', '=', 'product.pid')->get();
    }
    public function getIdSlug($id){
        return DB::table('comment')
        ->join('product', 'comment.pid', '=', 'product.pid')
        ->join('users', 'comment.id', '=', 'users.id')
    	->where('cmt_id',$id)->first();
    }
    public function addItem($data){
    	return DB::table('comment')->insert($data);
    }
    public function getDeActive($data, $id){
    	return DB::table('comment')
    	->where('id',$id)->update($data);
    }
    
    public function getStarActive($id){
    	return DB::table('comment')
        ->join('users', 'users.id', '=', 'comment.id')
        ->join('product', 'product.pid', '=', 'comment.pid')
        ->where('comment.pid',$id)
        ->where('activeStar', 0)
    	->orderBy('cmt_id','desc')->get();
    }

    public function editItem($data,$id){
    	return DB::table('comment')->where('cmt_id',$id)->update($data);
    }
    public function getItemFirst($id){
    	return $this->findOrFail($id);
    }
    public function delItem($id){
    	return DB::table('comment')->where('cmt_id',$id)->delete();
    }
    public function searchItem($data){
        return DB::table('comment')
        ->join('product', 'product.pid', '=', 'comment.pid')
    	->where('cmt_id', 'LIKE', '%' . $data . '%')
    	->orWhere ('comment', 'LIKE', '%' . $data . '%')
        ->orWhere ('pname', 'LIKE', '%' . $data . '%')
        ->orWhere ('rating', 'LIKE', '%' . $data . '%')
    	->paginate(3);
    }
}