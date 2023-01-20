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
        Schema::create('template_form_fields', function (Blueprint $table) {
            $table->id();
            $table-> integer('position_id');
            $table->foreignId('form_id')
            ->constrained('forms')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('form_field_id')
            ->constrained('form_fields')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('label')->nullable();
            $table->string('label_type')->nullable();
            $table->foreignId('field_type')
            ->constrained('form_fieldtypes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->string('placeholder')->nullable();
            $table->integer('required')->default(0);
            $table->integer('min_length')->nullable();
            $table->integer('max_length')->nullable();            
            $table->integer('show_in_listing')->nullable();
            $table->integer('show_in_icp_chart')->nullable();
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
        Schema::dropIfExists('template_form_fields');
    }
};
