<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository as Permission;
use App\Http\Requests\PermissionRequest;

class PermissionsController extends Controller {

    /**
     * Repostory permission
     *
     * @var PermissionRepository
     */
    private $permission;

    /**
     * Construc controller.
     *
     * @param  Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = $this->permission->search($request);

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
        $permission = $this->permission->save(null, $request->all());

        $route = ($request->get('task')=='apply') ? route('admin.permissions.edit', $permission->id) : route('admin.permissions.index');

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
        $permission = $this->permission->getModel()->findOrFail($id);

        return view('permissions.show', compact('permission'));
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
        $permission = $this->permission->getModel()->findOrFail($id);

        $form = $formBuilder->create('App\Forms\PermissionForm', [
            'model' => $permission,
            'method' => 'PATCH',
            'url' => route('admin.permissions.update', $id)
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  PermissionRequest  $request
     * @return Response
     */
    public function update($id, PermissionRequest $request)
    {
        $this->permission->save($id, $request->all());

        $route = ($request->get('task')=='apply') ? route('admin.permissions.edit', $id) : route('admin.permissions.index');

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
        $this->permission->getModel()->findOrFail($id)->delete();

        return redirect(route('admin.permissions.index'))->with([
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
        $this->permission->deleteAll($request->get('ids'));      

        return redirect(route('admin.permissions.index'))->with([
            'status' => trans('messages.deleted'), 
            'type-status' => 'success'
        ]);
    }
}
