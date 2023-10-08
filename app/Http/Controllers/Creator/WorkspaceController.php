<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Services\WorkspaceService;
use Illuminate\Http\Request;
use App\Services\Pages\PagesService;

class WorkspaceController extends Controller
{
    protected $workspaceService;

    // constructor
    public function __construct(WorkspaceService $workspaceService)
    {
        $this->middleware(['auth', 'role:creator']);
        $this->workspaceService = new WorkspaceService;
    }

    // index
    public function index()
    {
        // fetch all workspaces
        $workspaces = $this->workspaceService->index();
        // return
        return inertia('Creator/Workspace/Index', [
            'workspaces' => $workspaces
        ]);
    }

    // create
    public function create()
    {
        //
    }

    // show edit
    public function show(Request $request, $tag)
    {
        // show workspace by tag
        $workspace = $this->workspaceService->show($request, $tag);

        //
        $path_clone = 'https://inertiajs.com/';
        $pagesService = new PagesService();
        $page = $pagesService
            ->clone($path_clone, 'clones/')
            ->screenShote('storage/screenshots/')
            ->load();

        // return
        return inertia('Creator/Workspace/Show', [
            'workspace' => $workspace,
            'page' => $page
        ]);

    }

    // generate store update destroy
    public function store(Request $request)
    {
        // call store method from service
        $this->workspaceService->store($request);
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }

}
