<?php namespace App\Repositories;

use Illuminate\Http\Request;
use App\User;

class UserRepository extends Repository
{
    protected $order_fields = [
        'id',
        'name',
        'role',
        'created_at'
    ];

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function search(Request $request, $paginate=true)
    {
        $query = $this->order($request->all());

        if ($request->has('search')) {
            $search = $request->get('search');

            $query->where('users.name', 'LIKE', '%' . $search . '%')
                ->orWhere('users.email', 'LIKE', '%' . $search . '%');
        }

        return ($paginate) ? $query->paginate($request->get('limit', config('custom.paginate'))) : $query->get();
    }

    public function save($id, $data)
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return parent::save($id, $data);
    }
}
