<?php

namespace Api\Controller;

class Author
{
	public function listing()
	{
		return 'list of authors';
	}

	public function get($id)
	{
		// check valid uuid
		// get author from db
		$data = [];
		if (empty($data)) {
			//$app->abort(404, 'Author not found.');
		}

		return 'get author: '.$id;
	}

	public function books($id)
	{

	}

	public function create()
	{

	}

	public function update($id)
	{

	}

	public function delete($id)
	{

	}
}
