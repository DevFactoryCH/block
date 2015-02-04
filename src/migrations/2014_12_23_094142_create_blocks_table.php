<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('blocks', function($table)
    {
      $table->increments('id');
      $table->string('region')->nullable();
      $table->string('title');
      $table->text('body');
      $table->boolean('status');
      $table->integer('format');
      $table->integer('weight');
      $table->text('pages')->nullable();
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
    Schema::drop('blocks');
  }

}
