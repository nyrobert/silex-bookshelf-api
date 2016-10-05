<?php

use Api\Exception;
use Api\ResponseFactory;
use Api\ContentNegotiation;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//\Symfony\Component\Debug\ErrorHandler::register();
//\Symfony\Component\Debug\ExceptionHandler::register();

$app = new \Api\App();
$app['controllers']->assert('id', '[0-9a-f\-]+');
$app['debug'] = true;

$authorController = 'Api\\Controller\\Author';
$bookController   = 'Api\\Controller\\Book';

$app->get('/authors', $authorController . '::authors')->bind('authors');
$app->get('/authors/{id}', $authorController . '::author')->bind('author');
$app->get('/authors/{id}/books', $authorController . '::books')->bind('authorBooks');
$app->post('/authors', $authorController . '::create')->bind('createAuthor');
$app->put('/authors/{id}', $authorController . '::update')->bind('updateAuthor');
$app->delete('/authors/{id}', $authorController . '::delete')->bind('deleteAuthor');

$app->get('/books', $bookController . '::books')->bind('books');
$app->get('/books/{id}', $bookController . '::book')->bind('book');
$app->post('/books', $bookController . '::create')->bind('createBook');
$app->put('/books/{id}', $bookController . '::update')->bind('updateBook');
$app->put('/books/{id}/image', $bookController . '::updateImage')->bind('updateBookImage');
$app->delete('/books/{id}', $bookController . '::delete')->bind('deleteBook');

$app->before(function (Request $request) {
	(new ContentNegotiation())->validate($request);
});

$app->error(function (Exception\Error $e, Request $request, $statusCode) {
	return ResponseFactory::createError($e, $statusCode);
});

$app->error(function (\Exception $e, Request $request, $statusCode) {
	switch ($statusCode) {
		case Response::HTTP_NOT_FOUND:
			$exception = new Exception\ResourceNotFound();
			break;
		case Response::HTTP_METHOD_NOT_ALLOWED:
			$exception = new Exception\UnsupportedHttpVerb();
			break;
		default:
			$exception = new Exception\InternalError();
	}

	return ResponseFactory::createError($exception, $exception->getStatusCode());
});

return $app;
