<?php

namespace App\Services;

use App\Models\Workspace;

class WorkspaceService
{

    // index
    public function index()
    {
        // fetch all workspaces
        $workspaces = Workspace::all();
        // return
        return $workspaces;
    }

    // generate store update destroy
    public function store($request)
    {
        // validate request data name and sslug
        $request->validate([
            'name' => 'required|string|max:255|unique:workspaces',
            'tag' => 'required|string|max:255|unique:workspaces',
        ]);

        // create workspace
        $workspace = Workspace::create([
            'name' => $request->name,
            'tag' => $request->slug,
            'domain' => 'https://'.$request->slug.'.pageartisan.com',
        ]);

        // return response to controller
        return response()->json([
            'message' => 'Workspace created successfully',
            'workspace' => $workspace
        ], 201);
    }

    public function update($request)
    {
        //
    }

    public function destroy($request)
    {
        //
    }

    // assigned avatar to workspace
    public function assignAvatar($request)
    {
        //
    }

}
