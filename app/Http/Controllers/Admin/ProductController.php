<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW='admin.products.';

    public function index()
    {
        $data=Product::query()->with('catelogue')->latest('id')->get();
        // $data=Arr::sortAsc($data);
        // foreach($data as $datum){
        //     $datum->catelogue->name;
        //     dd($datum);
        // }

        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catelogues=Catelogue::query()->get();
        $colors=ProductColor::query()->get();
        $sizes=ProductSize::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('catelogues','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->cover);
        echo 1;
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'catelogue' => 'required',
            'price_regular' => 'required',
            'price_sale' => 'required',
            'sizes'=>'required',
            'color'=>'required'
        ]);
        $data=$request->except('cover');
        $sizes=$request->sizes;
        $colors=$request->colors;
        $n=1;
        return 1;
        $error=0;
        for($i=0;$i<count($sizes);$i++){
            for($x=$n;$x<count($colors);$x++){
                $value1=[$sizes[$i],$colors[$i]];
                $value2=[$sizes[$x],$colors[$x]];
                if($value1==$value2){
                    $error=1;
                }
            }
            $n++;
        }
        if(!$error){
            // $test=Product::query()->create($data);
            return redirect()->route('admin.products.create');
        }
        return redirect()->route('admin.products.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
