<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartProduct extends Model
{
    use HasFactory;
    protected $table = 'cartproduct';
    protected $primaryKey = 'cpid';
    public function getItem($id){
        return DB::table('cartproduct')
            ->join('product', 'cartproduct.pid', '=', 'product.pid')
            ->join('users', 'users.id', '=', 'cartproduct.id')
            ->where('cartproduct.id', $id)
            ->orderBy('cartproduct.cpid','asc')->get();
    }
    public function getItemProduct($id){
        return DB::table('cartproduct')
            ->join('product', 'cartproduct.pid', '=', 'product.pid')
            ->join('users', 'users.id', '=', 'cartproduct.id')
            ->where('cartproduct.pid', $id)
            ->orderBy('cartproduct.cpid','asc')->get();
    }
    public function addItem($data){
    	return DB::table('cartproduct')->insert($data);
    }
    public function editItem($data,$pid,$id){
    	return DB::table('cartproduct')->where('pid',$pid)->where('id',$id)->update($data);
    }
    public function delItem($cpid){
    	return DB::table('cartproduct')->where('cpid',$cpid)->delete();
    }
}
