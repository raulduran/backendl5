<?php namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

abstract class Repository {

	protected $model;

	protected $order_fields = ['id', 'created_at', 'updated_at'];
	protected $order = 'id';
	protected $order_direction = 'desc';

	public function __construct(Model $model)
	{
		$this->model = $model;
	}	

	public function getModel()
	{
		return $this->model;
	}

	public function search(Request $request, $paginate=true)
	{
		$query = $this->order($request->all());

		if ($request->has('search'))
		{
			$search = $request->get('search');
			$query->where('id', $search);
		}

		return ($paginate) ? $query->paginate($request->get('limit', config('custom.paginate'))) : $query->get();
	}

	public function order(Array $params)
	{
		$this->order = (isset($params['sortBy'])) ? $params['sortBy'] : $this->order;
		$this->order_direction = (isset($params['direction'])) ? $params['direction'] : $this->order_direction;

		if ($this->order && $this->order_direction && in_array($this->order, $this->order_fields))
		{
			return $this->model->orderBy($this->order, $this->order_direction);
		}
		
		return $this->model;
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
		$this->model->destroy($ids);
	}

}