<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedMediaTypeParameter extends Error
{
	public function __construct($statusCode = Response::HTTP_UNSUPPORTED_MEDIA_TYPE)
	{
		parent::__construct(
			$statusCode,
			'JSON API media type is modified with media type parameters.'
		);
	}
}
