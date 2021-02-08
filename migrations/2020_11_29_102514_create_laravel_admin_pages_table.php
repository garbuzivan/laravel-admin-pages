<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelAdminPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('la_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('descriptions')->nullable();
            $table->string('url')->nullable();
            $table->longText('text')->nullable();
            $table->integer('active_text')->references('id')->on('la_page_versions');
            $table->integer('publish')->default(1);
            $table->timestamps();
        });

        Schema::create('la_page_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('pages_id')->references('id')->on('la_pages');
            $table->longText('text')->nullable();
            $table->longText('code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('la_pages');
        Schema::dropIfExists('la_page_versions');
    }
}
