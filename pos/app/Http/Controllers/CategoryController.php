<?php

namespace App\Http\Controllers;

use App\Brand;
use Throwable;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.table',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=Brand::find(request('brand'));
       $storedata= $this->validate($request,[
            'brand' => 'required',
            'name' => 'required|min:3'
        ]);

       $category= Category::updateOrCreate([
            
            'name'=>$storedata['name']
        ]);

        $category->brands()->attach($brand->id);
        notify()->success('Category Added Successful');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request['name']=$request['category'];
       $this->validate($request,[
           'name'=>['required',
                    Rule::unique('categories')->ignore($category->name,'name')
            ]
       ]);

        notify()->success('Category Update Successful!');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $result =  $category->delete();
            
            return back();
        } catch (Throwable $e) {
            report($e);
            notify()->error('Something went wrong');
            return back();
            
        }
     
        
        
    }
    public function findCategory(Request $request,Brand $brand)   
    {
        if($brand){
            return response()->json($brand->categories);

        }
         else{
             return response()->json([]);
         }
    }
}
