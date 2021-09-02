<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'pid';
    protected $fillable = ['pid','pname', 'cid', 'description', 'price', 'discount','picture','cart',
                            'star','updated_at','created_at'];
    public function getItem(){
        return DB::table('product')
            ->join('category', 'category.cid', '=', 'product.cid')
            ->orderBy('pid','desc')->paginate(5);
    }
    public function getCatItem($id){
        return DB::table('product')
            ->join('category', 'category.cid', '=', 'product.cid')
            ->where('category.cid',$id)
            ->orderBy('product.pid','desc')->get();
    }
    public function getItemCount(){
        return DB::table('product')
            ->join('category', 'category.cid', '=', 'product.cid')
            ->orderBy('pid','asc')->get();
    }
    public function getItemCat($id){
        return DB::table('product')
            ->join('category', 'category.cid', '=', 'product.cid')
            ->where('product.cid', $id)
            ->orderBy('pid','asc')->paginate(4);
    }
    public function getProduct($id){
        return DB::table('product')
            ->join('category', 'category.cid', '=', 'product.cid')
            ->where('product.pid',$id)
            ->first();
    }
    public function getProductSeller(){
        return DB::table('product')
                    ->orderByDesc('discount')
                    ->limit(2)
                    ->get();
    }
    public function getProductSale(){
        return DB::table('product')
                    ->orderBy('price')
                    ->limit(2)
                    ->get();
    }
    public function getAlsoProduct($cid, $id){
        return DB::table('product')
            ->where('cid',$cid)
            ->where('pid', '<>', $id)
            ->get();
    }
    public function getCart(){
        return DB::table('product')
            ->where('cart', 1)
            ->get();
    }

    public function getProducts(){
    	return DB::table('product')->get();
    }
    public function getIdSlug($id){
    	return DB::table('product')
    	->where('pid',$id)->first();
    }

//admin
    public function addItem($data){
    	return DB::table('product')->insert($data);
    }
    public function editItem($data,$id){
    	return DB::table('product')->where('pid',$id)->update($data);
    }
    public function getItemFirst($id){
    	return $this->findOrFail($id);
    }
    public function delItem($id){
    	return DB::table('product')->where('pid',$id)->delete();
    }
    public function searchItem($data){
    	return DB::table('product')
    	->join('category', 'category.cid', '=', 'product.cid')
    	->where('pid', 'LIKE', '%' . $data . '%')
    	->orWhere ('pname', 'LIKE', '%' . $data . '%')
        ->orWhere ('price', 'LIKE', '%' . $data . '%')
        ->orWhere ('discount', 'LIKE', '%' . $data . '%')
    	->orWhere ('description', 'LIKE', '%' . $data . '%')
    	->orWhere ('cname', 'LIKE', '%' . $data . '%')
    	->paginate(5);
    }


}
