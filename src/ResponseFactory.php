<?php

namespace Api;

class ResponseFactory
{
	public static function createError(Exception\Error $e, $statusCode)
	{
		return (new Response())->get(
			(new Document\Error())->generate($e->getName(), $statusCode, $e->getMessage()),
			$statusCode
		);
	}
}
