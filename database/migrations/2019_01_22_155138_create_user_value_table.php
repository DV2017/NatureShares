<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserValueTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_value', function (Blueprint $table) {
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('value_id');
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('value_id')->references('id')->on('values');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users_values');
  }
}
