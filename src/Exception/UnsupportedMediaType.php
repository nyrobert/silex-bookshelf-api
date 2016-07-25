<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedMediaType extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_UNSUPPORTED_MEDIA_TYPE,
			'JSON API media type is missing from Content-Type header or modified with parameters.'
		);
	}
}
