<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

       $categories = Category::all();
       // $categories = Category::paginate(10);
       // need to test if with 'books' works
       // $categories = Category::with('books')->get();

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = Auth::user();
            $user->authorizeRoles('admin');
    
            $categories = Category::all();
            return view('admin.categories.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // before storing, the values below are checked
        $request->validate([
           'name' => 'required',
        ]); 

        // saves data input from forum to db
        Category::create([
            // 'id' => Auth::id(),
            'name' => $request->name
            // 'updated_at' => now()
        ]);
        
        // when you create the article, it redirects you back to the index. There you will see the newly made article
        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if(!Auth::id()) {
           return abort(403);
         }

        return view('admin.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');#

        return view('admin.categories.edit')->with('category', $category);
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
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // before storing, the values below are checked
        $request->validate([
            'name' => 'required'
        ]);

        // specified fields that are to update when submitting forum
        $category->update([
            'name' => $request->name
        ]);

        // after updating the article it returns to the original view of the article
        return to_route('admin.categories.show', $category)->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        
        $category->delete();

        // confirmation message will popup when returning to index after successfully deleting article
        return to_route('admin.categories.index')->with('success', 'Categroy deleted successfully');
    }
}
