<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $categories;
    protected $category;
    protected $type;
    protected $image;
    protected $imageName;
    protected $directory;
    protected $imageUrl;

    public function index(){
       $this->categories = Category::all();
        return view('category.manage',['categories'=> $this->categories]);
    }
    public function  add(){
        return view('category.add');
    }
    public function newCategory(Request $request){
       //return $request->all();
        $this->image = $request->file('image');
        $this->type = $this->image->getClientOriginalExtension();
        $this->imageName = time().'.'.$this->type;
        $this->directory ='category-images/';
        $this->image->move($this->directory, $this->imageName);

        $this->category                  = new Category();
        $this->category->name            = $request->name;
        $this->category->description     = $request->description;
        $this->category->image           = $this->directory.$this->imageName;
        $this->category->save();

       // Category::create($request->all());
        return redirect('/add-category')->with('message', 'Category Information Save Successfully');
    }
    public function edit($id){
        $this->category = Category::find($id);
        return view('category.edit',['category'=> $this->category]);
    }
    public function update(Request $request){
          $this->category          = Category::find($request->id);
        if($this->image = $request->file('image'))
        {
            if(file_exists($this->category->image))
            {
                unlink($this->category->image);
            }
            $this->type             = $this->image->getClientOriginalExtension();
            $this->imageName        = time().'.'.$this->type;
            $this->directory        ='category-images/';
            $this->image->move($this->directory, $this->imageName);
            $this->imageUrl         = $this->directory.$this->imageName;

        }
        else
        {
            $this->imageUrl  = $this->category->image;
        }


       $this->category->name             = $request->name;
       $this->category->description      = $request->description;
       $this->category->image            =  $this->imageUrl;
       $this->category->save();
       return redirect('/all-category')->with('message', 'Category Information Save Successfully');

    }
    public function  delete($id){
        $this->category = Category::find($id);
        $this->category->delete();
        return redirect('/all-category')->with('message', 'Category Information delete Successfully');
    }
}
