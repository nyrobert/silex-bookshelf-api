<?php

namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;

class ErrorResponse
{
	const VERSION    = '1.0';
	const MEDIA_TYPE = 'application/vnd.api+json';

	private $response = [];

	public function get($code, $status, $title)
	{
		$this->response = [
			'errors' => [
				'code'   => $code,
				'status' => (string) $status,
				'title'  => $title,
			],
		];

		$this->setVersion();

		return new JsonResponse($this->response, $status, ['Content-Type' => self::MEDIA_TYPE]);
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
