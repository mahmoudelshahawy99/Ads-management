<?php

namespace App\Http\Controllers\API;

use App\Models\Tag;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Tag as TagResource;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
    * function to view all tags
    */

    public function index()
    {
        $tags = Tag::all();
        if(!empty($tags)){
            return $this->sendResponse(TagResource::collection($tags),'All tags found');
        }else{
            return $this->sendError('error' ,['error'=> 'There are no tags']);
        }
    }

    /**
    * function to save new tag
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

        $tag = Tag::create($input);
        return $this->sendResponse(new TagResource($tag) ,'Tag created successfully');

    }

    /**
    * function to show data for specific tag
    */

    public function show(Tag $tag)
    {
        return $this->sendResponse(new TagResource($tag) ,'Tag details');
    }

    /**
    * function to update data for specific tag
    */

    public function update(Request $request, Tag $tag)
    {

        $input = $request->all();
        $validator = Validator::make($input,[
        'name'=> 'required',
        'description'=> 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Please validate error' ,$validator->errors() );
        }

        $tag->name = $input['name'];
        $tag->description = $input['description'];
        $tag->save();
        return $this->sendResponse(new TagResource($tag) ,'Tag updated successfully' );

    }

    /**
    * function to delete specific tag
    */

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return $this->sendResponse(new TagResource($tag) ,'Tag deleted successfully' );
    }
}
