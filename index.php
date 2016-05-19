<?php

require_once 'vendor/autoload.php';

$app = new Silex\Application();

$app->get('/artists', function () use ($app) {
	return 'list of artists';
});

$app->get('/artists/{id}', function ($id) use ($app) {
	return 'get artist';
});

$app->get('/artists/{id}/books', function ($id) use ($app) {
	return 'list of artist\'s books';
});

$app->post('/artists', function () use ($app) {
	return 'create new artist';
});

$app->put('/artists/{id}', function ($id) use ($app) {
	return 'update artist';
});

$app->delete('/artists/{id}', function ($id) use ($app) {
	return 'delete artist';
});

$app->get('/books', function () use ($app) {
	return 'list of books';
});

$app->get('/books/{id}', function ($id) use ($app) {
	return 'get book';
});

$app->post('/books', function () use ($app) {
	return 'create new book';
});

$app->put('/books/{id}', function ($id) use ($app) {
	return 'update book';
});

$app->put('/books/{id}/image', function ($id) use ($app) {
	return 'update book image';
});

$app->delete('/books/{id}', function ($id) use ($app) {
	return 'delete book';
});

$app->run();
