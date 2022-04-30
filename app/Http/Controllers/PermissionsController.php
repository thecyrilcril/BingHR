<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $actionCollection = \App\Models\Action::select('id', 'name')->get();
        $permissionCollection = \App\Models\Permission::with('actions')->select('id', 'name')->get();
        $permissions = $permissionCollection->map(function($permission) use($actionCollection) {

            return [
              'id' => $permission->id,
              'name' => $permission->name,
              'actions' => $actionCollection->map(function($action) use($permission) {
                return [
                  'id' => $action->id,
                  'name' => $action->name,
                  'active' => false !== collect($permission->actions->pluck('id')->toArray())->contains($action->id),
                ];
              })
            ];

        });
        return new \Illuminate\Http\JsonResponse($permissions, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
