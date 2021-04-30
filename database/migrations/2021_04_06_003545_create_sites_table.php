<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSitesTable extends Migration{
    public function up(){
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img_icon');
            $table->string('site_link');
            $table->tinyInteger('status');
            $table->tinyInteger('responsive');
            $table->text('description');
            $table->text('security');
            $table->text('location');
            $table->text('speed');
            $table->text('domain_owner');
            $table->text('frontend_languages');
            $table->text('backend_languages');
            $table->text('frameworks');
            $table->text('cms');
            $table->integer('score');
            $table->text('meta_description');
            $table->string('slug')->unique();
            $table->string('title_page')->unique();
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('sites');
    }
}
