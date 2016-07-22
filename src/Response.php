<?php

namespace Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class Response
{
	public function get($data, $statusCode)
	{
		if ($data) {
			return new JsonResponse($data, $statusCode, ['Content-Type' => App::MEDIA_TYPE]);
		}

		return new HttpResponse('', $statusCode);
	}
}
