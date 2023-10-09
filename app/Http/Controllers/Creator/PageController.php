<?php

namespace App\Http\Controllers\Creator;

use App\Services\Pages\PagesService;
use Illuminate\Support\Facades\Request;

class PageController
{

    protected $pageService;
    // constructor
    public function __construct()
    {
        // init the service
        $this->pageService = new PagesService();
    }

    // index
    public function index()
    {
        // show all pages
        $pages = $this->pageService->index();

        // return
        return inertia('Creator/Page/Index', [
            'pages' => $pages
        ]);

    }

    // create
    public function create(Request $request)
    {
        //
        $this->pageService->create($request);
    }
}
