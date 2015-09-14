<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\Permission;

class PermissionRepository extends Repository {

    protected $order_fields = [
        'id',
        'name',
        'created_at'
    ];

    public function __construct(Permission $permission, $paginate=true)
    {
        $this->model = $permission;
    }

    public function search(Request $request, $paginate=true)
    {
        $query = $this->order($request->all());

        if ($request->has('search'))
        {
            $search = $request->get('search');

            $query->where('permissions.id', 'LIKE', '%' . $search . '%')
                ->orWhere('permissions.name', 'LIKE', '%' . $search . '%')
            ;
        }

        return ($paginate) ? $query->paginate($request->get('limit', config('custom.paginate'))) : $query->get();
    }
}