<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class RolesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = Role::results($request);

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
        $role = Role::create($request->all());

        $route = ($request->get('task')=='apply') ? route('admin.roles.edit', $role->id) : route('admin.roles.index');

        return redirect($route)->with([
            'status' => trans('messages.saved'),
            'type-status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FormBuilder  $formBuilder
     * @return Response
     */
    public function edit(Role $role, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\RoleForm', [
            'model' => $role,
            'method' => 'PATCH',
            'url' => route('admin.roles.update', $role->id)
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Role  $role
     * @param  RoleRequest  $request
     * @return Response
     */
    public function update(Role $role, RoleRequest $request)
    {
        $role->update($request->all());

        $route = ($request->get('task')=='apply') ? route('admin.roles.edit', $role->id) : route('admin.roles.index');

        return redirect($route)->with([
            'status' => trans('messages.saved'),
            'type-status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

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
        Role::destroy($request->get('ids'));

        return redirect(route('admin.roles.index'))->with([
            'status' => trans('messages.deleted'),
            'type-status' => 'success'
        ]);
    }
}
