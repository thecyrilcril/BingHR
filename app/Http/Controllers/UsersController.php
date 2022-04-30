<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::with('role', 'permission')->orderBy('id', 'desc');
        return new \App\Http\Resources\UserCollection($users->cursorPaginate(7)->withQueryString());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\UserRequest $request)
    {
        try {
            $user = \App\Models\User::create($request->validated());
            return new \Illuminate\Http\JsonResponse('user created', \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);

        } catch(\Exception $e) {
            return new \Illuminate\Http\JsonResponse($e->getMessage(), \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try {

            return new \Illuminate\Http\JsonResponse([
                'user' => [
                    'id' => $user->id,
                    'permission_id' => $user->permission_id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'mobile_number' => $user->mobile_number,
                    'role_id' => $user->role_id,
                    'user_name' => $user->user_name,
                ]
            ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);

        } catch (\Exception $e) {
            return new \Illuminate\Http\JsonResponse('', \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateUserRequest $request, User $user)
    {
        try {

            $user->update($request->validated());
            return new \Illuminate\Http\JsonResponse('', \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);

        } catch(\Exception $e) {
            return new \Illuminate\Http\JsonResponse('error', \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
