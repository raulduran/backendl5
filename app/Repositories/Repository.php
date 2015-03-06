<?php namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Repository {

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}	

	public function getModel()
	{
		return $this->model;
	}

	public function search(Request $request)
	{
		$query = $this->model->orderBy('id', 'ASC');

		if ($request->has('search'))
		{
			$search = $request->get('search');
			$query->where('id', $search);
		}

		return $query->paginate(config('custom.paginate'));
	}	

	public function getList($field='name')
	{
		return $this->model->lists($field, 'id');
	}

	public function getAllPaginate()
	{
		return $this->model->paginate(config('custom.paginate'));
	}

	public function getAll()
	{
		return $this->model->all();
	}

	public function save($id, $data)
	{
		$class = get_class($this->model);

		$object = (is_null($id)) ? new $class() : $class::find($id);
		$object->fill($data);
		$object->save();

		return $object;
	}

	public function deleteAll($ids)
	{
		print_r($ids);
		exit();
		$this->model->destroy($ids);
	}

}