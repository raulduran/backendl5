<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Repositories\UserRepository as User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller {

	/**
	 * Repostory user
	 *
	 * @var UserRepository
	 */
	private $user;

	/**
	 * Construc controller.
	 *
	 * @param  User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
     * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$results = $this->user->search($request);

		return view('users.index', compact('results'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  FormBuilder  $formBuilder
	 * @return Response
	 */
	public function create(FormBuilder $formBuilder)
	{
		$form = $formBuilder->create('App\Forms\UserForm', [
			'method' => 'POST',
			'url' => route('admin.users.store')
		]);

		return view('layout.partials.form', compact('form'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  UserRequest  $request
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$user = $this->user->save(null, $request->all());

		$route = ($request->get('task')=='apply') ? route('admin.users.edit', $user->id) : route('admin.users.index');

		return redirect($route)->with([
			'status' => trans('messages.saved'), 
			'type-status' => 'success'
		]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->getModel()->findOrFail($id);

		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @param  FormBuilder  $formBuilder
	 * @return Response
	 */
	public function edit($id, FormBuilder $formBuilder)
	{
		$user = $this->user->getModel()->findOrFail($id);

		$form = $formBuilder->create('App\Forms\UserForm', [
			'model' => $user,
			'method' => 'PATCH',
			'url' => route('admin.users.update', $id)
		]);

		return view('layout.partials.form', compact('form'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param  UserRequest  $request
	 * @return Response
	 */
	public function update($id, UserRequest $request)
	{
		$data = ($request->has('password')) ? $request->all() : $request->except('password');

		$this->user->save($id, $data);

		$route = ($request->get('task')=='apply') ? route('admin.users.edit', $id) : route('admin.users.index');

		return redirect($route)->with([
			'status' => trans('messages.saved'), 
			'type-status' => 'success'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->getModel()->findOrFail($id)->delete();

		return redirect(route('admin.users.index'))->with([
			'status' => trans('messages.deleted'), 
			'type-status' => 'success'
		]);
	}

	/**
	 * Delete various.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function delete(Request $request)
	{
		$ids = $request->only('ids');

		$this->user->deleteAll($ids);

		return redirect(route('admin.users.index'))->with([
			'status' => trans('messages.deleted'), 
			'type-status' => 'success'
		]);
	}

}
