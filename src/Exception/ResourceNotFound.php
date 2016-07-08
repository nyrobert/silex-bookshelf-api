<?php

namespace Api\Exception;

use Symfony\Component\HttpFoundation\Response;

class ResourceNotFound extends Error
{
	public function __construct()
	{
		parent::__construct(
			Response::HTTP_NOT_FOUND,
			'The specified resource does not exist.'
		);
	}
}
