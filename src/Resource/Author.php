<?php

namespace Api\Resource;

class Author extends Base
{
	const TYPE = 'author';

	/**
	 * @var string
	 */
	public $name;

	public static function create($id, $name, $url)
	{
		$object       = new self();
		$object->id   = $id;
		$object->name = $name;
		$object->url  = $url;

		return $object;
	}

	public function generate()
	{
		return [
			'type'       => self::TYPE,
			'id'         => $this->id,
			'attributes' => [
				'name' => $this->name,
			],
			'links' => [
				'self' => $this->url,
			],
		];
	}
}
