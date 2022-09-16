<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    /**
    * function to view all categories
    */

    public function index()
    {
        $categories = Category::all();
        if(!empty($categories)){
            return $this->sendResponse(CategoryResource::collection($categories),'All categories found');
        }else{
            return $this->sendError('error' ,['error'=> 'There are no categories']);
        }
    }

    /**
    * function to save new category
    */

    public function store(Request $request)
    {

        $input = $request->all();
        $validator = Validator::make($input,[
            'name'=> 'required',
            'description'=> 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors());
        }

        $category = Category::create($input);
        return $this->sendResponse(new CategoryResource($category) ,'Category created successfully');

    }

    /**
    * function to show data for specific category
    */

    public function show(Category $category)
    {
        return $this->sendResponse(new CategoryResource($category) ,'Category details');
    }

    /**
    * function to update data for specific category
    */

    public function update(Request $request, Category $category)
    {

        $input = $request->all();
        $validator = Validator::make($input,[
        'name'=> 'required',
        'description'=> 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
        }

        $category->name = $input['name'];
        $category->description = $input['description'];
        $category->save();
        return $this->sendResponse(new CategoryResource($category) ,'Category updated successfully' );

    }

    /**
    * function to delete specific category
    */

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse(new CategoryResource($category) ,'Category deleted successfully' );
    }
}
