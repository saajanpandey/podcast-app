<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImageTrait;
    public $imageDir = '/uploads/category';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($this->imageDir, $request->image);
        }
        Category::create($data);
        return redirect()->route('category.index')->with('create', 'Category Created Successfully !');
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
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->save();
        return redirect()->route('category.index')->with('update', 'Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        if (!empty($categories->image)) {
            $this->removeImage($this->imageDir, $categories->image);
        }
        $categories->delete();
        return redirect()->route('category.index')->with('delete', 'Category Deleted Successfully !');
    }

    public function categoryUpdateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $category = Category::find($id);
        if (!empty($category->image)) {
            $this->removeImage($this->imageDir, $category->image);
            $category->image = $this->uploadImage($this->imageDir, $request->image);
            $category->save();
            return redirect()->route('category.index')->with('update', 'Image Updated Successfully!');
        } else {
            $category->image = $this->uploadImage($this->imageDir, $request->image);
            $category->save();
            return redirect()->route('category.index')->with('update', 'Image Updated Successfully!');
        }
    }
}
