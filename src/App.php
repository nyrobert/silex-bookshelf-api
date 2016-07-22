<?php

namespace Api;

use Silex\Application;

class App extends Application
{
	use Application\UrlGeneratorTrait;

	const MEDIA_TYPE = 'application/vnd.api+json';
}
