<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCategory = $request->name;
        $validator = $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $newCategory;
        $resp = $category->save();
        if (isset($resp)) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully added',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        dd($request);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $newCategory = $request->name;
        $validator = $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($request->id);
        $category->name = $newCategory;
        $resp = $category->save();
        if (isset($resp)) {
            return response()->json([
                'success' => true,
                'message' => 'Category successfully updated',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->deleted_at = now();
        $category->update();

        return 1;
    }
}
