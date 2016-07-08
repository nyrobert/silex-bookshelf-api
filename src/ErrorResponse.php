<?php

namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorResponse
{
	const VERSION    = '1.0';
	const MEDIA_TYPE = 'application/vnd.api+json';

	private $response = [];

	public function get($code, $statusCode, $title)
	{
		$this->response = [
			'errors' => [
				'code'   => $code,
				'status' => (string) $statusCode,
				'title'  => $title,
			],
		];

		$this->setVersion();

		return new JsonResponse($this->response, $statusCode, ['Content-Type' => self::MEDIA_TYPE]);
	}

	private function setVersion()
	{
		$data = [
			'jsonapi' => [
				'version' => self::VERSION,
			]
		];
		$this->response = array_merge($this->response, $data);
	}
}
