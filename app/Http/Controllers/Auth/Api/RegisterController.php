<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    public function register(StoreUpdateUser $request)
    {
        
        $user = $this->userService->registerNewUser($request->validated());

        return new UserResource($user);
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return UserResource::collection($users);
    }


    public function desploy(int $id)
    {
        $users = $this->userService->deleteUser($id);
        return response()->json(['delete' => true], 204);
    }
}
