<?php

namespace Api\Controller;

use Api\App;
use Api\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Author
{
	public function authors()
	{
		return 'list of authors';
	}

	public function author($id, Request $request, App $app)
	{
		if (strpos($request->headers->get('Content-Type'), ';') !== false) {
			throw new Exception\UnsupportedMediaTypeParameter();
		}

		$accept = $request->headers->get('Accept');
		if (strpos($accept, 'application/vnd.api+json') !== false) {
			$mediaTypes = explode(',', $accept);
			foreach ($mediaTypes as $mediaType) {
				if (strpos($mediaType, 'application/vnd.api+json') === 0
					&& strpos($mediaType, ';') !== false
				) {
					throw new Exception\UnsupportedMediaTypeParameter(Response::HTTP_NOT_ACCEPTABLE);
				}
			}
		}

		$response = [
			'data' => [
				'type'       => 'author',
				'id'         => $id,
				'attributes' => [
					'name' => 'Isaac Asimov'
				],
			],
			'links' => [
				'self' => $app->url('author', ['id' => $id]),
			],
			'relationships' => [
				'books' => [
					'data' => [
						[
							'type'  => 'book',
							'id'    => '1',
							'links' => [
								'self' => $app->url('book', ['id' => '1']),
							],
						],
						[
							'type'  => 'book',
							'id'    => '2',
							'links' => [
								'self' => $app->url('book', ['id' => '2']),
							],
						],
					],
					'links' => [
						'self' => $app->url('authorBooks', ['id' => $id]),
					],
				],
			],
			'jsonapi' => [
				'version' => '1.0'
			],
		];

		$include = $request->query->get('include');
		if ($include) {
			if ($include === 'books') {
				$response['included'] = [
					[
						'type' => 'book',
						'id'   => '1',
						'attributes' => [
							'title'            => 'Foundation',
							'publication_date' => '1951-01-01',
							'description'      => 'desc1'
						],
						'links' => [
							'self' => $app->url('book', ['id' => '1']),
						],
					],
					[
						'type' => 'book',
						'id'   => '2',
						'attributes' => [
							'title'            => 'I, Robot',
							'publication_date' => '1950-12-02',
							'description'      => 'desc2'
						],
						'links' => [
							'self' => $app->url('book', ['id' => '2']),
						],
					],
				];
			} else {
				throw new Exception\UnsupportedQueryParameter();
			}
		}

		return $app->json(
			$response,
			Response::HTTP_OK,
			['Content-Type' => 'application/vnd.api+json']
		);
	}

	public function books()
	{

	}

	public function create()
	{

	}

	public function update($id)
	{

	}

	public function delete($id)
	{

	}
}
