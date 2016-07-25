<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedMediaTypeParameter extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_NOT_ACCEPTABLE,
			'JSON API media type is modified with media type parameters.'
		);
	}
}
