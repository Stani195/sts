<?php


namespace st_php3\Action;


use GuzzleHttp\Psr7\ServerRequest;
use st_php3\Model\Language;
use function view;

class LanguageGetAction
{
    public function __invoke(ServerRequest $request)
    {

        $limba = Language::find($request->getAttribute('id'));

        return view('language-get', [
            'limba' => $limba
        ]);

    }
}