<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCategorySiteTable extends Migration{
    public function up(){
        Schema::create('category_site', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('category_site');
    }
}
