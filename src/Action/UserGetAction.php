<?php


namespace st_php3\Action;


use GuzzleHttp\Psr7\ServerRequest;
use st_php3\Model\User;
use function view;


class UserGetAction
{
    public function __invoke(ServerRequest $request)
    {

        $user = User::find($request->getAttribute('id'));


        return view('user-get', [
            'user' => $user
        ]);

    }
}