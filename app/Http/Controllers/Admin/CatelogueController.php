<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCatelogueRequest;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class CatelogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW='admin.catelogues.';
    const PATH_UPLOAD='catelogues';
    public function index()
    {
        $data=Catelogue::query()
        ->latest('id')
        ->paginate(5);
        // dd($data);
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatelogueRequest $request)
    {
        $data=$request->except('cover');
        // dd($request->is_active);
        $data['is_active']=($request->is_active=='on'?1:0);
        if($request->hasFile('cover')){
            $data['cover']=Storage::put(self::PATH_UPLOAD,$request->file('cover'));
        }
        Catelogue::query()->create($data);
        // return self::index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Catelogue::query()->findOrFail($id);
        // dd($catelogue);
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catelogue=Catelogue::query()->findOrFail($id);
        // dd($catelogue);
        return view(self::PATH_VIEW.__FUNCTION__,compact('catelogue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model=Catelogue::query()->findOrFail($id);
        $data=$request->except('cover');
        $data['is_active']=($request->is_active=='on'?1:0);
        // dd($data['is_active']); 
        if($request->hasFile('cover')){
            $data['cover']=Storage::put(self::PATH_UPLOAD,$request->file('cover'));
        }
        $currentCover=$model->cover;
        $model->update($data);
        if($currentCover&&$request->hasFile('cover')&&Storage::exists($currentCover)){
            Storage::delete($currentCover);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model=Catelogue::query()->findOrFail($id);
        $model->delete();
        return redirect()->route('admin.catelogues.index');
    }
    public function trash(){
        $datas=Catelogue::onlyTrashed()->get();
        // dd($datas)->toArray();
        return view(self::PATH_VIEW.__FUNCTION__,compact('datas'));
    }
    public function forceDelete($id){
        $catelogue=Catelogue::onlyTrashed()->findOrFail($id);
        $catelogue->forceDelete();
        return redirect()->route('admin.catelogues.trash');
    }
    public function restore($id){
        $catelogue=Catelogue::onlyTrashed()->findOrFail($id);
        $catelogue->restore();
        return redirect()->route('admin.catelogues.index');
    }
}
