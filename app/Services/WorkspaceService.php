<?php

namespace App\Services;

use App\Models\Workspace;

class WorkspaceService
{

    // index
    public function index()
    {
        // fetch all workspaces by latest
        $workspaces = Workspace::latest()->get();
        // return
        return $workspaces;
    }

    // generate store update destroy
    public function store($request)
    {
        // validate request data name and slug
        $request->validate([
            'name' => 'required|string|max:255|unique:workspaces',
            'tag' => 'required|string|max:255|unique:workspaces',
        ]);

        // create workspace
        $workspace = Workspace::create([
            'name' => $request->name,
            'tag' => $request->tag,
            'domain' => 'https://'.$request->tag.'.pageartisan.com',
        ]);

        // return response to controller
        return response()->json([
            'message' => 'Workspace created successfully',
            'workspace' => $workspace,
            'tag' => $workspace->tag,
        ], 201);
    }

    // show
    public function show($request, $tag)
    {
        // fetch workspace by tag
        $workspace = Workspace::where('tag', $tag)->firstOrFail();
        // return
        return $workspace;
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
