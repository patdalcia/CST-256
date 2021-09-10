<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDemographicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_demographic', function (Blueprint $table) {
            $table->id();
            $table->string('gender', 100);
            $table->integer('age');
            $table->string('education', 100);
            $table->string('interests', 100);
            $table->string('country', 100);
            // $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * !!! I ran into an issue where this migration would create a "user_demographic" table, when the "user_demographics" (s) 
     * table was already in use. That one seemed to migrate fine when I cloned the repo, this one did not.
     */
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_demographic');
    }
}
