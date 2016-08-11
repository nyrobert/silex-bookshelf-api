<?php

use Api\App;
use Api\Exception\UnsupportedMediaTypeParameter;
use Codeception\Util\HttpCode;

/**
 * @link http://jsonapi.org/format/#content-negotiation
 */
class ContentNegotiationCest
{
	const AUTHOR_ID = '11a38b9a-b3da-360f-9353-a5a725514269';

	public function validAcceptHeader(ApiTester $I)
	{
		$I->haveHttpHeader('Accept', App::MEDIA_TYPE);
		$I->sendGET('/authors/'.self::AUTHOR_ID);
		$I->seeResponseCodeIs(HttpCode::OK);
		$I->seeResponseIsJson();
	}

	public function invalidAcceptHeader(ApiTester $I)
	{
		$I->haveHttpHeader('Accept', App::MEDIA_TYPE.';param=1');
		$I->sendGET('/authors/'.self::AUTHOR_ID);
		$I->seeResponseCodeIs(HttpCode::NOT_ACCEPTABLE);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(['errors' => [
			'code'   => (new UnsupportedMediaTypeParameter())->getName(),
			'status' => (string) HttpCode::NOT_ACCEPTABLE,
		]]);
	}
}
