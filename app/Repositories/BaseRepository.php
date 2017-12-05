<?php namespace App\Repositories;

use App\Repositories\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract class BaseRepository implements BaseInterface
{
	private $app;

	private $model;

	public function __construct(App $app)
	{
		$this->app = $app;
		$this->makeModel();
	}

	public abstract function model();

	public function all(array $columns = ['*'])
	{
		return $this->model->get($columns);
	}

	public function find($id, array $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(array $data, $id)
	{
		$model = $this->model->find($id);

        $model->fill($data);

        if(!$model->isDirty()){
            return false;
        }

        return $model->save();
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function makeModel()
	{
		$model = $this->app->make($this->model());

		if(!$model instanceof Model)
			throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

		return $this->model = $model;
	}
}