<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PageTypeEnum;
use App\Enums\PageVisibilityEnum;
use App\Enums\PageStatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // create the pages table
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            // workspace id foreign key
            $table->foreignId('workspace_id')->constrained('workspaces')->onDelete('cascade');
            // user id foreign key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // page details
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default(PageStatusEnum::Queued);
            $table->string('visibility')->default(PageVisibilityEnum::Private);
            $table->string('type')->default(PageTypeEnum::Single);
            $table->string('url')->nullable();

            // page media
            $table->string('screenshot')->nullable();

            // page settings
            $table->json('settings')->nullable();

            // timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
