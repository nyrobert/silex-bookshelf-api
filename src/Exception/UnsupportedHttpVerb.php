<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedHttpVerb extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_METHOD_NOT_ALLOWED,
			'The resource doesn\'t support the specified HTTP verb.'
		);
	}
}
