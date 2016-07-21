<?php

namespace Api\Document;

class Error extends Base
{
	public function generate($code, $statusCode, $title)
	{
		$this->response = [
			'errors' => [
				'code'   => $code,
				'status' => (string) $statusCode,
				'title'  => $title,
			],
		];

		$this->setVersion();

		return $this->response;
	}
}
