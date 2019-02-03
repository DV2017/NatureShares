<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('companies', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->string('image');
      $table->text('description');
      $table->string('address');
      $table->string('postcode');
      $table->string('city');
      $table->string('state');
      $table->string('country');
      $table->string('telephone');
      $table->string('website_url');
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
    Schema::dropIfExists('companies');
  }
}
