<?php

namespace Api\Controller;

use Api\App;
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
			return $app->json(
				['errors' => ''],
				Response::HTTP_UNSUPPORTED_MEDIA_TYPE,
				['Content-Type' => 'application/vnd.api+json']
			);
		}

		$accept = $request->headers->get('Accept');
		if (strpos($accept, 'application/vnd.api+json') !== false) {
			$mediaTypes = explode(',', $accept);
			foreach ($mediaTypes as $mediaType) {
				if (strpos($mediaType, 'application/vnd.api+json') === 0
					&& strpos($mediaType, ';') !== false
				) {
					return $app->json(
						['errors' => ''],
						Response::HTTP_NOT_ACCEPTABLE,
						['Content-Type' => 'application/vnd.api+json']
					);
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
				return $app->json(
					[
						'errors' => [
							'code'   => '?',
							'status' => Response::HTTP_BAD_REQUEST,
							'title'  => '?',
							'detail' => '?',
						],
					],
					Response::HTTP_BAD_REQUEST,
					['Content-Type' => 'application/vnd.api+json']
				);
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
