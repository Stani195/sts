<?php


namespace st_php3\Action;


use GuzzleHttp\Psr7\ServerRequest;
use function var_dump;
use function view;

class UserGetAction
{
    public function __invoke(ServerRequest $request)
    {

        var_dump($request->getAttribute('id'));
        exit;

        return view('user-get');

    }
}