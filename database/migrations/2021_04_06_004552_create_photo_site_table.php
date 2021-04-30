<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePhotoSiteTable extends Migration{
    public function up(){
        Schema::create('photo_site', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');

            $table->unsignedBigInteger('photo_id');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('photo_site');
    }
}
