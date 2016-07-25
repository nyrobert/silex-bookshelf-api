<?php

namespace Api;

use Symfony\Component\HttpFoundation\Request;

class ContentNegotiation
{
	public function validate($request)
	{
		$this->validateContentTypeHeader($request);
		$this->validateAcceptHeader($request);
	}

	private function validateContentTypeHeader(Request $request)
	{
		if ($request->getContent()) {
			if ($request->headers->get('Content-Type') !== App::MEDIA_TYPE) {
				throw new Exception\UnsupportedMediaType();
			}
		}
	}

	private function validateAcceptHeader(Request $request)
	{
		$accept = $request->headers->get('Accept');
		if (strpos($accept, App::MEDIA_TYPE) !== false) {
			$mediaTypes = explode(',', $accept);
			foreach ($mediaTypes as $mediaType) {
				if (strpos($mediaType, App::MEDIA_TYPE) === 0 && strpos($mediaType, ';') !== false) {
					throw new Exception\UnsupportedMediaTypeParameter();
				}
			}
		}
	}
}
