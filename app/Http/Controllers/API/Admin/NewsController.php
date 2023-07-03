<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Carbon\Carbon;
use Carbon\Traits\Date;

class NewsController extends Controller
{
     public function index(){

         return response()->json(News::all());
     }

     public function show($id){

         return response()->json(News::find($id));
     }

     public function destroy($id){
         News::destroy($id);

         return response()->json(['message'=>'Новость успешно удалена'],202);
     }
     public function approve(News $news){
         if($news->is_published==1)
             return response()->json(['error' => 'Новость уже была одобрена'], 400);

         $news->update([
             'is_published'=>true,
             'published_at'=>Carbon::now()
         ]);

         return response()->json(['message' => 'Новость успешно одобрена','news'=>$news]);

     }
}
