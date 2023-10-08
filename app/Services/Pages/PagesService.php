<?php

namespace App\Services\Pages;

use Goutte\Client;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

class PagesService
{
    protected $file_path = null;
    protected $path_clone = null;

    // constructor
    public function __construct()
    {
    }

    public function clone($path, $save_path)
    {
        $this->path_clone = $path;

        $client = new Client();

        // Fetch the HTML content of the webpage
        $crawler = $client->request('GET', $path);

        // Extract the HTML content
        $htmlContent = $crawler->html();

        // save to file
        $file_name = 'clone_' . time() . '.html';
        $this->file_path = $save_path . $file_name;

        // save to file system with storage
        \Storage::disk('public')->put($this->file_path, $htmlContent);


        return $this;
    }

    // screenshot
    public function screenShote($save_path)
    {
        // check if path clone is null
        if ($this->path_clone == null) {
            return null;
        }

        // check if folder with screenshots is not exist then create it
        if (!\File::exists(public_path($save_path))) {
            \File::makeDirectory(public_path($save_path), $mode = 0777, true, true);
        }

        // save to file with public file
        $file_name = 'screenshot_' . time() . '.png';

        // save to file system with storage
        $screenPath  = public_path($save_path.$file_name);

        // capture screen and save to file
        Browsershot::url($this->path_clone)
            ->windowSize(1920, 1080)
            ->save($screenPath);

        // return
        return $this;
    }

    // load page with path from storage path
    public function load()
    {
        // check if file path is null
        if ($this->file_path == null) {
            return null;
        }

        // load from public path
        $file_path = '/storage/' . $this->file_path;

        // return
        return $file_path;
    }


    // index
    public function index()
    {
        //
    }

    // generate store update destroy
    public function store($request)
    {
        //
    }

    public function show($request, $tag)
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

}
