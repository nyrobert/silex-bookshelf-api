<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class UnsupportedQueryParameter extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_BAD_REQUEST,
			'One of the query parameters specified in the request URI is not supported.'
		);
	}
}
