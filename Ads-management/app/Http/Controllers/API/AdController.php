<?php

namespace App\Http\Controllers\API;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ad as AdResource;

class AdController extends Controller
{

    public function showAds($id)
    {
        $ads = Ad::where('advertiser_id',$id)->get()->toArray();
        if(!empty($ads)){
            return $this->sendResponse(AdResource::collection($ads),'All advertieses found');
        }else{
            return $this->sendError('error' ,['error'=> 'There are no advertieses']);
        }
    }

    public function filterCat($category)
    {
        $ads = Ad::whereHas('category', function ($query) use ($category)  {
            $query->where('name', '=', $category);
        })->get()->toArray();
        if(!empty($ads)){
            return $this->sendResponse(AdResource::collection($ads),'All advertieses found');
        }else{
            return $this->sendError('error' ,['error'=> 'There are no advertieses']);
        }
    }

    public function filterTag($tag)
    {
        $ads = Ad::whereHas('tag', function ($query) use ($tag)  {
            $query->where('name', '=', $tag);
        })->get()->toArray();
        if(!empty($ads)){
            return $this->sendResponse(AdResource::collection($ads),'All advertieses found');
        }else{
            return $this->sendError('error' ,['error'=> 'There are no advertieses']);
        }
    }
}
