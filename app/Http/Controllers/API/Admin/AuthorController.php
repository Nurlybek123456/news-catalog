<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(){
        return response()->json(Author::all());
    }


    public function store(AuthorRequest $request){
        $data = $request->validated();
        $author = Author::create($data);

        return response()->json(['message' => 'Автор успешно создан', 'author' => $author], 201);
}

    public function update(AuthorRequest $request,$id){
        $author = Author::find($id);
        $author->update($request->validated());

        return response()->json(['message' => 'Автор успешно обновлен', 'author' => $author], 201);
    }

    public function destroy($id){
        Author::destroy($id);

        return response()->json(['message' => 'Автор успешно удален'], 202);

    }
}
