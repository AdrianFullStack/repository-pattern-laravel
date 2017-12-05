<?php namespace App\Repositories;

interface BaseInterface
{
	public function all(array $columns = ['*']);

	public function find($id, array $columns = ['*']);

	public function create(array $data);

	public function update(array $data, $id);

	public function delete($id);
}