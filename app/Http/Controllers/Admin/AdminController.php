<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(Category $cat, Product $product, Comment $comment, Users $users){
		$this->cat          = $cat;
        $this->product      = $product;
        $this->comment      = $comment;
        $this->users        = $users;
    }
    public function index(){
        $itemCat = $this->cat->getItemCount();
        $countCat = count($itemCat);
        $itemProduct = $this->product->getItemCount();
        $countProduct = count($itemProduct);
        $itemComment = $this->comment->getItemCount();
        $countComment = count($itemComment);
        $itemUser = $this->users->getItemCount();
        $countUser = count($itemUser);
        return view('admin.index',compact('countCat','countProduct','countComment','countUser'));
    }
}
