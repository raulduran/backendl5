<?php namespace App\Http\Requests;

use Illuminate\Auth\Guard;
use App\Http\Requests\Request;
use App\Role;

class UserRequest extends Request
{
    private $user;

    /**
     * Construct
     *
     * @param Illuminate\Auth\Guard  auth
     */
    public function __construct(Guard $auth)
    {
        $this->user = $auth->user();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate_email = ($this->method=='POST') ? 'required|email|unique:users,email' : 'required|email|unique:users,email,'.$this->segment(3);

        return [
            'email' => $validate_email,
            'roles' => 'required',
            'name' => 'required',
            'password' => ($this->method=='POST') ? 'required|min:6' : 'min:6'
        ];
    }
}
