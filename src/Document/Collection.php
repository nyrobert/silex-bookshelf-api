<?php

namespace Api\Document;

class Collection extends Base
{
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
}
