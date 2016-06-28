<?php

use Api\App;

$authorController = 'Api\\Controller\\Author';
$bookController   = 'Api\\Controller\\Book';

$app = new \Api\App();
$app['controllers']->assert('id', '[0-9a-f\-]+');
$app['debug'] = true;

$app->get('/authors', $authorController.'::listing')->bind('authors');
$app->get('/authors/{id}', $authorController.'::get')->bind('author');
$app->get('/authors/{id}/books', $authorController.'::books')->bind('books');
$app->post('/authors', $authorController.'::create')->bind('createAuthor');
$app->put('/authors/{id}', $authorController.'::update')->bind('updateAuthor');
$app->delete('/authors/{id}', $authorController.'::delete')->bind('deleteAuthor');

$app->get('/books', $bookController.'::inventory');
$app->get('/books/{id}', $bookController.'::get');
$app->post('/books', $bookController.'::create');
$app->put('/books/{id}', $bookController.'::update');
$app->put('/books/{id}/image', $bookController.'::updateImage');
$app->delete('/books/{id}', $bookController.'::delete');

$app->match('/', function () use ($app) {
	$app->abort(400, 'HTTP method not implemented.');
})->method('PATCH|OPTION');

return $app;
