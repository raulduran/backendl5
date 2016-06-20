<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $results = User::results($request);

        return view('users.index', compact('results', 'request'));
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
        $user = User::create($request->all());

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
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @param  FormBuilder  $formBuilder
     * @return Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\UserForm', [
            'model' => $user,
            'method' => 'PATCH',
            'url' => route('admin.users.update', $user->id)
        ]);

        return view('layout.partials.form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @param  UserRequest $request
     * @return Response
     */
    public function update(User $user, UserRequest $request)
    {
        $user->update($request->all());

        $route = ($request->get('task')=='apply') ? route('admin.users.edit', $id) : route('admin.users.index');

        return redirect($route)->with([
            'status' => trans('messages.saved'),
            'type-status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

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
        User::destroy($request->get('ids'));

        return redirect(route('admin.users.index'))->with([
            'status' => trans('messages.deleted'),
            'type-status' => 'success'
        ]);
    }
}
