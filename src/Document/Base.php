<?php

namespace Api\Document;

abstract class Base
{
	const VERSION = '1.0';

	protected $response = [];

	protected function setVersion()
	{
		$data = [
			'jsonapi' => [
				'version' => self::VERSION,
			]
		];

		$this->response = array_merge($this->response, $data);
	}
}
