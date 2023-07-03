<?php

namespace App\Http\Controllers\API;

use App\Filters\NewsFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\Heading;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(NewsFilter $request){
        $news = News::filter($request)->paginate(10);

        return response()->json($news);
    }

    public function show($id){
        return response()->json(News::find($id));
    }

    public function store(NewsRequest $request){
        $data = $request->validated();
        $news = News::create($data);

        return response()->json(['message' => 'Новость отправлена на модерацию', 'news'=>$news], 201);
}

    public function update(NewsRequest $request,$id){
        $news = News::find($id);
        $news->update($request->validated());

        return response()->json(['message' => 'Новость успешно обновлена', 'news'=>$news], 201);
    }

    public function destroy($id){
        News::destroy($id);

        return response()->json(['message' => 'Новость успешно удалена'], 202);
    }



    public function getByAuthor($id){
        $news = News::where('author_id',$id)->get();

        return response()->json($news);
    }


    public function getByHeading($id)
    {
        // Получаем категорию по имени
        $heading = Heading::find($id);

        if (!$heading) {
            return response()->json(['error' => 'Рубрика не найдена'], 404);
        }



        // Рекурсивно получаем все дочерние категории
        $headingIds = $this->getChildHeadingIds($heading);


        // Получаем новости, относящиеся к указанным категориям
        $news = News::whereIn('heading_id', $headingIds)->paginate(10);

        return response()->json($news);
    }

    private function getChildHeadingIds($heading)
    {
        $headingIds = [$heading->id];

        foreach ($heading->children as $child) {
            $headingIds = array_merge($headingIds, $this->getChildHeadingIds($child));
        }

        return $headingIds;
    }

}
