<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiscountUser extends Model
{
    protected $table = 'discount_user';
    public function getItem($id, $id_code){
        return DB::table('discount_user')
        ->join('users', 'users.id', '=', 'discount_user.id')
        ->join('discount_code', 'discount_code.id_code', '=', 'discount_user.id_code')
        ->where('discount_user.id',$id)
        ->where('discount_user.id_code',$id_code)->get();
    }
    public function addItem($data){
    	return DB::table('discount_user')->insert($data);
    }
}
