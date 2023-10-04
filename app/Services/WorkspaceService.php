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
        //
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
