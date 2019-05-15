<?php


namespace st_php3\Action;


use GuzzleHttp\Psr7\ServerRequest;
use st_php3\Model\Citie;
use st_php3\Model\countrie;
use function view;

class CitieGetAction
{
    public function __invoke(ServerRequest $request)
    {

        $citie = Citie::find($request->getAttribute('id'));

        $countrie = countrie::find(1);

        return view('citie-get', [
            'citie' => $citie,
            'countrie' => $countrie,
        ]);

    }
}