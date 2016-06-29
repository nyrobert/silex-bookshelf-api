<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Api\App;

$authorController = 'Api\\Controller\\Author';
$bookController   = 'Api\\Controller\\Book';

$app = new \Api\App();
$app['controllers']->assert('id', '[0-9a-f\-]+');
$app['debug'] = true;

$app->get('/authors', $authorController.'::authors')->bind('authors');
$app->get('/authors/{id}', $authorController.'::author')->bind('author');
$app->get('/authors/{id}/books', $authorController.'::books')->bind('authorBooks');
$app->post('/authors', $authorController.'::create')->bind('createAuthor');
$app->put('/authors/{id}', $authorController.'::update')->bind('updateAuthor');
$app->delete('/authors/{id}', $authorController.'::delete')->bind('deleteAuthor');

$app->get('/books', $bookController.'::books')->bind('books');
$app->get('/books/{id}', $bookController.'::book')->bind('book');
$app->post('/books', $bookController.'::create')->bind('createBook');
$app->put('/books/{id}', $bookController.'::update')->bind('updateBook');
$app->put('/books/{id}/image', $bookController.'::updateImage')->bind('updateBookImage');
$app->delete('/books/{id}', $bookController.'::delete')->bind('deleteBook');

$app->match('/', function () use ($app) {
	$app->abort(400, 'HTTP method not implemented.');
})->method('PUT|OPTION');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
	switch ($code) {
		case Response::HTTP_NOT_FOUND:
			$message = 'The requested page could not be found.';
			break;
		default:
			$message = 'We are sorry, but something went terribly wrong.';
	}

	return $app->json(
		['errors' => Response::$statusTexts[$code]],
		$code,
		['Content-Type' => 'application/vnd.api+json']
	);
});

return $app;
