<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePhotosTable extends Migration{
    public function up(){
        Schema::create('photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_path');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('photos');
    }
}
