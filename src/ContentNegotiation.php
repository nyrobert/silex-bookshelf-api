<?php

namespace Api;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentNegotiation
{
	public function validate($request)
	{
		$this->validateContentTypeHeader($request);
		$this->validateAcceptHeader($request);
	}

	private function validateContentTypeHeader(Request $request)
	{
		if (strpos($request->headers->get('Content-Type'), ';') !== false) {
			throw new Exception\UnsupportedMediaTypeParameter();
		}
	}

	private function validateAcceptHeader(Request $request)
	{
		$accept = $request->headers->get('Accept');
		if (strpos($accept, 'application/vnd.api+json') !== false) {
			$mediaTypes = explode(',', $accept);
			foreach ($mediaTypes as $mediaType) {
				if (strpos($mediaType, 'application/vnd.api+json') === 0
					&& strpos($mediaType, ';') !== false
				) {
					throw new Exception\UnsupportedMediaTypeParameter(Response::HTTP_NOT_ACCEPTABLE);
				}
			}
		}
	}
}
