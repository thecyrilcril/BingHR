<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class UpdatePermissionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(\App\Http\Requests\UpdatePermissionRequest $request, Permission $permission)
    {
        try {
            $permission->actions()->sync([$request->validated()['action']], false);
            return new \Illuminate\Http\JsonResponse('', \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
        } catch(\Exception $e) {
            return new \Illuminate\Http\JsonResponse('error', \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);

        }
    }
}
