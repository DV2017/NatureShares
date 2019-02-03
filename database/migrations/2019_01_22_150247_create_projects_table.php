<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->string('image');
      $table->text('description');
      $table->unsignedInteger('company_id')->index();
      $table->dateTime('start_date');
      $table->dateTime('end_date');
      $table->string('address');
      $table->string('postcode');
      $table->string('city');
      $table->string('state');
      $table->string('country');
      $table->string('website_url');
      $table->timestamps();
      $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('projects');
  }
}
