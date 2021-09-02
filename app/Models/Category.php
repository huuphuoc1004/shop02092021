<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'cid';
    public function getItem(){
        return DB::table('category')->orderBy('cid','desc')->paginate(5);
    }

    public function getItemCount(){
        return DB::table('category')->orderBy('cid','asc')->get();
    }
    public function getCat($id){
        return DB::table('category')->where('cid', $id)->first();
    }
    public function getItemCat($id){
        return DB::table('category')
            ->orderBy('cid','asc')->get();
    }

    public function addItem($data){
    	return DB::table('category')->insert($data);
    }

    public function editItem($data,$id){
    	return DB::table('category')->where('cid',$id)->update($data);
    }
    
    public function getItems($id){
    	return $this->findOrFail($id);
    }
    public function delItem($id){
    	return DB::table('category')->where('cid',$id)->delete();
    }

    public function searchItem($data){
    	return DB::table('category') 
    		->where('cname', 'LIKE', '%' . $data . '%')
    		->orWhere ('cid', 'LIKE', '%' . $data . '%')
    		->paginate(3);
    }

}
