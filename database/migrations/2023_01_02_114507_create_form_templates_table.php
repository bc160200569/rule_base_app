<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpOption\None;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')
            ->constrained('forms')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('form_field_id')
            ->constrained('form_fields')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('field_type')
            ->constrained('form_fieldtypes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('form_templates');
    }
};
