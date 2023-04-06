<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         DB::unprepared(file_get_contents(__DIR__.'/database/create_stored_procedure.sql'));
     }
 
     public function down()
     {
         // Drop the stored procedure if you need to rollback the migration
         DB::unprepared('DROP PROCEDURE IF EXISTS get_pbb');
     }
}
