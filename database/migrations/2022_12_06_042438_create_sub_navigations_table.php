<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_navigations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('is_show')->default(1);
            $table->string('route')->nullable();
            $table->integer('status')->default(0);
            // $table->unsignedBigInteger('nav_id');
            $table->timestamps();

            // $table->foreign('nav_id')->references('id')->on('navigations');
            $table->foreignId('nav_id')
            ->constrained('navigations')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_navigations');
    }
};
