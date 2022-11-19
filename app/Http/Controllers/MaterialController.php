<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::orderBy('id','desc')->get();
        return view('material.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('material.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:materials|alpha_num',
            'category' => 'required',
            'balance' => 'required|numeric|min:1'
        ]);

        $material = new Material();
        $material->name = $request->name;
        $material->category_id = $request->category;
        $material->balance = $request->balance;
        $material->save();
        
        return redirect()->route('materials.index')->with('status','Material has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('material.edit',compact('material','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $validator = $request->validate([
            'name' => 'required|unique:materials|alpha_num',
            'category' => 'required',
            'balance' => 'required|numeric|min:1'
        ]);

        $material = Material::find($request->id);
        $material->name = $request->name;
        $material->category_id = $request->category;
        $material->balance = $request->balance;
        $material->update();
        
        return redirect()->route('materials.index')->with('status','Material has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $material = Material::find($request->id);
        $material->deleted_at = now();
        $material->update();
        // dd($material->update());
        return 1;
        // return redirect()->route('materials.index')->with('status','Material has been deleted successfully');
    }

    public function getCategoryMaterial(Request $request){
        $category = $request->category;
        $materials = Material::where('category_id',$category)->get();
        return json_encode($materials);
    }
}
