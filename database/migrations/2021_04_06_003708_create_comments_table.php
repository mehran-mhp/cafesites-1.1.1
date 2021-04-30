<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCommentsTable extends Migration{
    public function up(){
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('description');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('comments');
    }
}
