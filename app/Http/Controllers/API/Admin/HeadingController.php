<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeadingRequest;
use App\Models\Heading;

class HeadingController extends Controller
{
    public function index(){
        dd(auth()->user());
        return response()->json(Heading::all());
    }

    public function show($id){
        return response()->json(Heading::find($id));
    }

    public function store(HeadingRequest $request){
        $data = $request->validated();
        $heading = Heading::create($data);

        return response()->json(['message' => 'Рубрика успешно создана', 'heading' => $heading], 201);
}

    public function update(HeadingRequest $request,$id){
        $heading = Heading::find($id);
        $heading->update($request->validated());

        return response()->json(['message' => 'Рубрика успешно обновлена', 'heading' => $heading], 201);
    }

    public function destroy($id){
        Heading::destroy($id);

        return response()->json(['message' => 'Рубрика успешно удалена'], 202);

    }
}
