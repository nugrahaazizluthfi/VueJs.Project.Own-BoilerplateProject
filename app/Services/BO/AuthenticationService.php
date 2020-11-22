<?php namespace App\Services\BO;

use Illuminate\Support\Facades\Hash;
use App\Repositories\BO\UserRepository as User;

class AuthenticationService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Service signin user
     * @param array $credentials
     * @return mixed
     */
    public function signin($credentials = array())
    {
        if($token = auth()->attempt($credentials))
        {
            return ['token' => $token , 'user' => auth()->user()];
        }

        return null;
    }

    /**
     * Service signout user
     * @param array $credentials
     * @return mixed
     */
    public function signout()
    {
        auth()->logout();

        return true;
    }
}
