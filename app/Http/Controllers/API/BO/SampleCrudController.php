<?php namespace App\Http\Controllers\API\BO;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\BO\UserRepository as User;

class SampleCrudController extends BaseController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //
    public function showUser()
    {
        return $this->success($this->user->countBy(['id' => '1']), 'Fetch data success...');
    }
}
