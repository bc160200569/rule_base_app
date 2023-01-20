<?php

namespace Database\Seeders;

use App\Models\FormField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormFieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $field_names = [

            'input',
            'label',
            'select',
            'textarea',
            'button',
            'fieldset',
            'legend',
            'datalist',
            'output',
            'option',
            'optgroup',

         ];
       
         foreach ($field_names as $field_name) {
              FormField::create(['field_name' => $field_name]);
         }
    }
}
