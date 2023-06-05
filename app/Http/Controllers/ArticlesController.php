<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * GET /api/v1/articles.json
     */
    public function list()
    {
        return Article::frontend_list(user()->articles());
    }

    /**
     * GET /api/v1/articles/{article_uid}.json
     */
    public function fetch($article_uid)
    {
        /** @var Article $article */
        $article = user()->articles()->where('articles.uid', $article_uid)->firstOrFail();
        return Article::frontend_fetch(Article::query()->where('id', $article->id))->firstOrFail();
    }

    /**
     * POST /api/v1/articles
     */
    public function create(Request $request)
    {
        $article = new Article();
        $article->user_id = user()->id;
        $article->title = $request->input('title');
        $article->save();
        return Article::frontend_fetch(Article::query()->where('id', $article->id))->firstOrFail();
    }

    /**
     * PATCH /api/v1/articles/{article_uid}
     */
    public function update($article_uid, Request $request)
    {
        /** @var Article $article */
        $article = user()->articles()->where('articles.uid', $article_uid)->firstOrFail();
        $article->title = $request->input('title');
        $article->save();
    }

    /**
     * DELETE /api/v1/articles/{article_uid}
     */
    public function remove($article_uid)
    {
        /** @var Article $article */
        $article = user()->articles()->where('articles.uid', $article_uid)->firstOrFail();
        $article->delete();
    }
}
