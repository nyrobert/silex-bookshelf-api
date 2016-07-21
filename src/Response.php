<?php

namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response
{
	const MEDIA_TYPE = 'application/vnd.api+json';

	public function get($data, $statusCode)
	{
		if ($data) {
			return new JsonResponse($data, $statusCode, ['Content-Type' => self::MEDIA_TYPE]);
		}

		return new HttpResponse('', $statusCode);
	}
}
