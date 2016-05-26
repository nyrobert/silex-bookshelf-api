<?php

use Silex\Application;

$app = new Application();
$app['debug'] = true;

$authorController = 'Api\\Controller\\Author';
$bookController   = 'Api\\Controller\\Book';

$app->get('/authors', $authorController.'::inventory');
$app->get('/authors/{id}', $authorController.'::get');
$app->get('/authors/{id}/books', $authorController.'::books');
$app->post('/authors', $authorController.'::create');
$app->put('/authors/{id}', $authorController.'::update');
$app->delete('/authors/{id}', $authorController.'::delete');

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
