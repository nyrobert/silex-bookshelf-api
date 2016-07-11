<?php

namespace Api\Resource;

class Book extends Base
{
	const TYPE = 'book';

	/**
	 * @var string
	 */
	public $title;

	/**
	 * @var string
	 */
	public $publicationDate;

	/**
	 * @var string
	 */
	public $description;

	public static function create($id, $title, $publicationDate, $description, $url)
	{
		$object                  = new self();
		$object->id              = $id;
		$object->title           = $title;
		$object->publicationDate = $publicationDate;
		$object->description     = $description;
		$object->url             = $url;

		return $object;
	}

	public function generate()
	{
		return [
			'type' => self::TYPE,
			'id'   => $this->id,
			'attributes' => [
				'title'            => $this->title,
				'publication_date' => $this->publicationDate,
				'description'      => $this->description,
			],
			'links' => [
				'self' => $this->url,
			],
		];
	}
}
