<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBlocksTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('blocks', function($table)
                   {
      $table->integer('format');
      $table->integer('weight');
      $table->string('region');
      $table->string('status');
      $table->text('info');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    $table->dropColumn('format');
    $table->dropColumn('weight');
    $table->dropColumn('region');
    $table->dropColumn('status');
    $table->dropColumn('info');
  }

}
