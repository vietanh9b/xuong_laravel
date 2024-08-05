<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catelogue;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $catelogues=Catelogue::query()->get();
        // dd($catelogues);
        // file_get_contents();
        return view('client.index',compact('catelogues'));
    }
}
