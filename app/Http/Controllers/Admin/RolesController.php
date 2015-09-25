<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository as Role;
use App\Http\Requests\RoleRequest;

class RolesController extends Controller {

    /**
     * Repostory role
     *
     * @var RoleRepository
     */
    private $role;

    /**
     * Construc controller.
     *
     * @param  Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = $this->role->search($request);

        return view('roles.index', compact('results', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  FormBuilder  $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\RoleForm', [
            'method' => 'POST',
            'url' => route('admin.roles.store')
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->role->save(null, $request->all());

        $route = ($request->get('task')=='apply') ? route('admin.roles.edit', $role->id) : route('admin.roles.index');

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
        $role = $this->role->getModel()->findOrFail($id);

        return view('roles.show', compact('role'));
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
        $role = $this->role->getModel()->findOrFail($id);

        $form = $formBuilder->create('App\Forms\RoleForm', [
            'model' => $role,
            'method' => 'PATCH',
            'url' => route('admin.roles.update', $id)
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  RoleRequest  $request
     * @return Response
     */
    public function update($id, RoleRequest $request)
    {
        $this->role->save($id, $request->all());

        $route = ($request->get('task')=='apply') ? route('admin.roles.edit', $id) : route('admin.roles.index');

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
        $this->role->getModel()->findOrFail($id)->delete();

        return redirect(route('admin.roles.index'))->with([
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
        $this->role->deleteAll($request->get('ids'));      

        return redirect(route('admin.roles.index'))->with([
            'status' => trans('messages.deleted'), 
            'type-status' => 'success'
        ]);
    }
}
