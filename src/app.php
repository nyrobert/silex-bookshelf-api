<?php

use Silex\Application;

$authorController = 'Api\\Controller\\Author';
$bookController   = 'Api\\Controller\\Book';
$uuidPattern      = '[0-9a-f\-]+';

$app = new Application();
$app['controllers']->assert('id', $uuidPattern);
$app['debug'] = true;

$app->get('/authors', $authorController.'::listing');
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
