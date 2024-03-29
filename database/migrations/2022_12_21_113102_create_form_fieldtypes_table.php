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
        Schema::create('form_fieldtypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_field_id')
            ->constrained('form_fields')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('field_type')->unique();
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('form_fieldtypes');
    }
};
