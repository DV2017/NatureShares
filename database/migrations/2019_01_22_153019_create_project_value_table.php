<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectValueTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('project_value', function (Blueprint $table) {
      $table->unsignedInteger('project_id');
      $table->unsignedInteger('value_id');
      $table->foreign('project_id')->references('id')->on('projects');
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
    Schema::dropIfExists('projects_values');
  }
}
