<?php

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/artists', function () {
	return 'list of artists';
});

$app->get('/artists/{id}', function ($id) {
	return 'get artist';
});

$app->get('/artists/{id}/books', function ($id) {
	return 'list of artist\'s books';
});

$app->post('/artists', function () {
	return 'create new artist';
});

$app->put('/artists/{id}', function ($id) {
	return 'update artist';
});

$app->delete('/artists/{id}', function ($id) {
	return 'delete artist';
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

$app['debug'] = true;

$app->run();
