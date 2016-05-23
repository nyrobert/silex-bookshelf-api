<?php

use Silex\Application;

$app = new Application();
$app['debug'] = true;

$app->get('/authors', function () {
	return 'list of authors';
});

$app->get('/authors/{id}', function ($id) {
	return 'get author';
});

$app->get('/authors/{id}/books', function ($id) {
	return 'list of authors\'s books';
});

$app->post('/authors', function () {
	return 'create new author';
});

$app->put('/authors/{id}', function ($id) {
	return 'update author';
});

$app->delete('/authors/{id}', function ($id) {
	return 'delete author';
});

$app->get('/books', function () {
	return 'list of books';
});

$app->get('/books/{id}', function ($id) {
	return 'get book';
});

$app->post('/books', function () {
	return 'create new book';
});

$app->put('/books/{id}', function ($id) {
	return 'update book';
});

$app->put('/books/{id}/image', function ($id) {
	return 'update book image';
});

$app->delete('/books/{id}', function ($id) {
	return 'delete book';
});

return $app;
