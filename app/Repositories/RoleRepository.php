<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\Role;

class RoleRepository extends Repository {

    protected $order_fields = [
        'id',
        'name',
        'created_at'
    ];

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function search(Request $request, $paginate=true)
    {
        $query = $this->order($request->all());

        if ($request->has('search'))
        {
            $search = $request->get('search');

            $query->where('roles.id', 'LIKE', '%' . $search . '%')
                ->orWhere('roles.name', 'LIKE', '%' . $search . '%')
                ->orWhere('roles.label', 'LIKE', '%' . $search . '%')
            ;
        }

        return ($paginate) ? $query->paginate($request->get('limit', config('custom.paginate'))) : $query->get();
    }
}