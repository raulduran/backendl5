<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class PermissionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = Permission::results($request);

        return view('permissions.index', compact('results', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  FormBuilder  $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PermissionForm', [
            'method' => 'POST',
            'url' => route('admin.permissions.store')
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequest  $request
     * @return Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        $route = ($request->get('task')=='apply') ? route('admin.permissions.edit', $permission->id) : route('admin.permissions.index');

        return redirect($route)->with([
            'status' => trans('custom/app.saved'),
            'type-status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Permission $permission
     * @return Response
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @param  FormBuilder $formBuilder
     * @return Response
     */
    public function edit(Permission $permission, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PermissionForm', [
            'model' => $permission,
            'method' => 'PATCH',
            'url' => route('admin.permissions.update', $permission->id)
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Permission $permission
     * @param  PermissionRequest $request
     * @return Response
     */
    public function update(Permission $permission, PermissionRequest $request)
    {
        $permission->update($request->all());

        $route = ($request->get('task')=='apply') ? route('admin.permissions.edit', $permission->id) : route('admin.permissions.index');

        return redirect($route)->with([
            'status' => trans('custom/app.saved'),
            'type-status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission $permission
     * @return Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect(route('admin.permissions.index'))->with([
            'status' => trans('custom/app.deleted'),
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
        Permission::destroy($request->get('ids'));

        return redirect(route('admin.permissions.index'))->with([
            'status' => trans('custom/app.deleted'),
            'type-status' => 'success'
        ]);
    }
}
