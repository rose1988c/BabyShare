<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotoTable extends Migration
{
    
    protected $table_name = 'photo';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function ($table)
        {
            $table->increments('id');
            $table->string('title', 100)->default('');
            $table->string('desc', 255)->default('');
            $table->string('path', 255)->default('');
            $table->dateTime('take_at')->default('0000-00-00 00:00:00');
            $table->softDeletes();
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
        Schema::drop($this->table_name);
    }

}
