<?php


namespace st_php3\Action;

use GuzzleHttp\Psr7\ServerRequest;
use function view;

class HomeAction
{
public function __invoke(ServerRequest $request)
{
 return view('index');
}
}