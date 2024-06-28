<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
        $this->middleware('admin');
    }

    public function index(): string|View
    {
        $articles = $this->articleRepository->getAll();
        return view('admin.article.index', compact('articles'));
    }

    public function create(): string|View
    {
        return view('admin.article.create');
    }

    public function store(CreateArticleRequest $request): RedirectResponse
    {
        if (!$this->articleRepository->createFromRequest($request)) {
            throw new \Exception('Cannot create article'); // TODO fix all such throw
        }
        return redirect()->route('admin.article.index')
            ->with('success', 'Article created');
    }

    public function edit(Article $article): string|View
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Article $article, CreateArticleRequest $request): RedirectResponse
    {
        if (!$this->articleRepository->updateFromRequest($request, $article)) {
            throw new \Exception('Cannot update article');
        }
        return redirect()->route('admin.article.index')
            ->with('success', 'Article updated');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if (!$article->delete()) {
            throw new \Exception('Cannot delete article');
        }
        return redirect()->route('admin.article.index')
            ->with('success', 'Article deleted');
    }
}
