<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    use  ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scolarships = ArticleResource::collection(Article::get());
        return $this->apiResponse($scolarships, 'ok', 200);
    }

   
    public function store(Request $request)
    {
        $input=$request->all();
        $validator = Validator::make($input , [
            'name'=>'required',
            'description'=>'required',
            'image'=>['nullable',],
           
        ]);

        $file_name=$this->saveImage($request->image,'images/article');




        if ($validator->fails()){
            return $this->apiResponse(null,$validator ->errors() , 400);
        }

        $article = Article::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name,

        ]);
        if($article) {
            return $this->apiResponse(new ArticleResource($article), 'This article save', 201);
        }
        return $this->apiResponse(null, 'This article not save', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
