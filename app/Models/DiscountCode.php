<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiscountCode extends Model
{
    use HasFactory;
    protected $table = 'discount_code';
    protected $primaryKey = 'id_code';
    public function getItem(){
        return DB::table('discount_code')
            ->orderBy('id_code','desc')->get();
    }
    public function editItem($data,$id){
    	return DB::table('discount_code')->where('id_code',$id)->update($data);
    }
}
