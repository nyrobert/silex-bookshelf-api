<?php

use Codeception\Util\HttpCode;

class ContentNegotiationCest
{
	const AUTHOR_ID = '11a38b9a-b3da-360f-9353-a5a725514269';

	public function validAcceptHeader(ApiTester $I)
	{
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/authors/'.self::AUTHOR_ID);
		$I->seeResponseCodeIs(HttpCode::OK);
		$I->seeResponseIsJson();
	}

	public function invalidAcceptHeader(ApiTester $I)
	{
		$I->haveHttpHeader('Accept', 'application/vnd.api+json;param=1');
		$I->sendGET('/authors/'.self::AUTHOR_ID);
		$I->seeResponseCodeIs(HttpCode::NOT_ACCEPTABLE);
		$I->seeResponseIsJson();
		$I->seeResponseContainsJson(['code'   => 'UnsupportedMediaTypeParameter']);
		$I->seeResponseContainsJson(['status' => (string) HttpCode::NOT_ACCEPTABLE]);
	}
}
