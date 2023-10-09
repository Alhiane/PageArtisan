<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkspacesSeedr extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seed workspaces table
        \DB::table('workspaces')->insert([
            [
                'name' => 'My Workspace',
                'tag' => 'my-workspace',
                'owner' => 1,
                'domain' => 'pageartisan.com',
                'avatar' => 'https://s3-alpha.figma.com/hub/file/1979832265/13b63148-1cca-4968-8789-0c9131cbf7d3-cover.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'My Workspace 2',
                'tag' => 'my-workspace-2',
                'owner' => 1,
                'domain' => 'pageartisan2.com',
                'avatar' => 'https://s3-alpha.figma.com/hub/file/1979832265/13b63148-1cca-4968-8789-0c9131cbf7d3-cover.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'My Workspace 3',
                'tag' => 'my-workspace-3',
                'owner' => 1,
                'domain' => 'pageartisan3.com',
                'avatar' => 'https://s3-alpha.figma.com/hub/file/1979832265/13b63148-1cca-4968-8789-0c9131cbf7d3-cover.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
