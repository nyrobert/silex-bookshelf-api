<?php

namespace Api\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class Error extends HttpException
{
	public function getName()
	{
		$name = get_called_class();
		return substr($name, strrpos($name, '\\') + 1);
	}
}
