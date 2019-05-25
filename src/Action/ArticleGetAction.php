<?php


namespace st_php3\Action;


use GuzzleHttp\Psr7\ServerRequest;
use st_php3\Model\Article;

use st_php3\Model\User;
use function view;


class ArticleGetAction
{
    public function __invoke(ServerRequest $request)
    {

        $article = Article::find($request->getAttribute('id'));
        $user = User::find($request->getAttribute('id'));

        return view('article-get', [
            'article' => $article,
            'user' => $user,

        ]);

    }
}