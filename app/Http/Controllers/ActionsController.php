<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $actions = \App\Models\Action::select('id', 'name')->get();
        return new \Illuminate\Http\JsonResponse($actions, \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
