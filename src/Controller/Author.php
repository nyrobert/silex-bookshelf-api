<?php

namespace Api\Controller;

use Api\App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Author
{
	public function listing()
	{
		return 'list of authors';
	}

	public function get($id, Request $request, App $app)
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

			],
			'links' => [
				'self' => $app->url('author', ['id' => $id]),
			],
			'jsonapi' => [
				'version' => '1.0'
			],
		];

		return $app->json(
			$response,
			Response::HTTP_OK,
			['Content-Type' => 'application/vnd.api+json']
		);
	}

	public function books($id)
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
