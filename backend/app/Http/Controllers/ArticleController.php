<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Services\UploadImagesService;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ArticleController
{
    protected Article $article;

    const ENTITY_TYPE = 2;
    const CATEGORY = 2;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function showAll(): Factory|View|Application|string
    {
        $articles = Article::with([
            'images' => function($q) {
                $q->where('entity_type_id', self::ENTITY_TYPE);
            }
        ])
            ->get()->toJson();

        return $articles;

        return response()->json(['data' => $articles]);

dd(1);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article): Response
    {
        return response([
            'article' => $article,
        ]);

        $article = Article::with([
            'images' => function($q) {
                $q->where('entity_type_id', self::ENTITY_TYPE);
            }
        ])
            ->where('id', $id)
            ->firstOrFail();

        return view('article.show', compact('article'));
    }

    public function create(): View
    {
        return view('article.create');
    }

    public function store(ArticleRequest $request)
    {
        $validatedData = $request->validated();

        $this->article->title = $validatedData['title'];
        $this->article->description = $validatedData['description'];
        $this->article->entity_type_id = self::ENTITY_TYPE;
        $this->article->category_id = self::CATEGORY;

        $lastId = Article::latest()->first()->id ?? 0;
        $currentId = $lastId + 1;

        UploadImagesService::save($request->files->get('files'), self::ENTITY_TYPE, $currentId);

        $this->article->save();
        dd('SUCCESS!');
    }

    public function edit(int $id)
    {
        $article = Article::find($id);
        $images = Image::where('entity_id', $id)
            ->where('entity_type_id', self::ENTITY_TYPE)
            ->get();

        return view('article.edit', compact('article', 'images'));
    }

    public function update(ArticleRequest $request, $id): RedirectResponse
    {
        dd($request);
        $article = Article::find($id);
        $article->title = $request['title'];
        $article->description = $request['description'];

        UploadImagesService::update(self::ENTITY_TYPE, $id, $request['is_main_image']);

        $article->update();

        return redirect()->route('article.show', compact('id'));
    }

    public function destroy($id): RedirectResponse
    {
        Article::where('id', $id)->delete();

        Image::where('entity_type_id', self::ENTITY_TYPE)
            ->where('entity_id', $id)
            ->delete();

        return redirect()->route('article.index');
    }
}
