<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class InternalError extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_INTERNAL_SERVER_ERROR,
			'The server encountered an internal error. Please retry the request later.'
		);
	}
}
