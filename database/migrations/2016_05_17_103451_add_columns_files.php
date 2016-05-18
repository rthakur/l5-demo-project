<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('files', function ($table) {
        $table->string('original_name');
        $table->string('description');
        $table->datetime('deleted_at')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('files', function ($table) {
        $table->dropColumn(['original_name','description','deleted_at']);
      });
    }
}
