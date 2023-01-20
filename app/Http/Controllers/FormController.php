<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
use App\Models\FormFieldtypes;
use App\Models\FormTemplate;
use App\Models\TemplateFormFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use SebastianBergmann\Template\Template;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forms = Form::all();
        if (View::exists('setup_form/index')) {
            return View('setup_form/index', compact('forms'));
        } else {
            echo "This view file are not exist";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $forms = Form::all();
        // $field_data = FormField::all();
        if (View::exists('setup_form/create')) {
            // return View('setup_form/create', compact('forms','field_data'));
            return View('setup_form/create');
        } else {
            echo "This view file are not exist";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        request()->validate([
            'formname' => 'required|unique:forms,formname',
        ]);

        // $table = new FormTemplate();
        // $table->form_id = $request->get('formname');
        // $table->form_field_id = $request->get('field');
        // $table->field_type = $request->get('field_type');
        // $table->name = $request->get('name');
        // $table->save();
        Form::create($request->all());

        return redirect()->route('form.index')
            ->with('success', 'From Template created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
        // echo "show";
        // dd($form['id']);
        // $form_name = Form::find($form);
        $field_data = FormField::all();
        $input_types = FormFieldtypes::where('form_field_id', 1)->where('is_active', 1)->get();
        // dd($input_types);
        if (View::exists('setup_form/create_form_template')) {
            return view('setup_form/create_form_template', compact('form', 'field_data', 'input_types'));
        } else {
            echo "This viwe file are not exist";
        }
    }
    
    public function savetemplate(Request $request)
    {
        // dd($request->all());
        // $addmore = ($request->all());
        // echo array_count($addmore);
        // $form_fields = $request->get('addmore');
        // foreach($form_fields as $field){
        // echo $field['input_label'];
        // }
        // dd($form_fields);
        $form_id = $request->get('form_id');
        // dd($request->get('addmore'));
        // dd($request->get('form_field_id'));
        // foreach($request->addmore as $key => $value)
        // dd($value['form_id']);
        $field_id = $request->get('form_field_id');
        request()->validate(
            [
                // 'addmore.*.form_id' => 'required',
                // 'form_id' => 'required',
                'addmore' => 'required'
            ],
            [
                // 'addmore.*.form_id.required' => 'Form not submit without select any field',
                // 'form_id.required' => 'Form not submit without select any field',
                'addmore.required' => 'Form not submit without select any field',
            ]
        );
            foreach ($request->addmore as $key => $value) {
                if ($value['form_field_id'] == 1) {
                    // request()->validate([
                    //     'input_type' => 'required',
                    // ],
                    // // ['addmore.*.form_id.required' => 'Form not submit without select any field']
                    // );
                    // $table = new TemplateFormFields();
                    // $table->form_id = $request->get('form_id');
                    // $table->form_field_id = $field_id;
                    // $table->label = $request->get('input_label');
                    // $table->label_type = $request->get('label_type');
                    // $table->field_type = $request->get('input_type');
                    // $table->placeholder = $request->get('input_placeholder');
                    // $table->value = $request->get('input_value');
                    // $table->max_length = $request->get('input_max_length');
                    // $table->is_active = $request->get('is_active');
                    // $table->save();

                    $table = new TemplateFormFields();
                    $table->position_id = $value['sorting_position'];
                    // $table->form_id = $value['form_id'];
                    $table->form_id = $form_id;
                    $table->form_field_id = $value['form_field_id'];
                    $table->label = $value['input_label'];
                    $table->label_type = $value['label_type'];
                    $table->field_type = $value['input_type'];
                    // $table->name = $value['name'];
                    $table->name = str_replace(' ', '_', strtolower($value['input_label']));
                    // dd($table);
                    $table->placeholder = $value['input_placeholder'];
                    $table->required = $value['required'];
                    $table->max_length = $value['input_max_length'];
                    $table->show_in_listing = $value['show_in_list'];
                    $table->show_in_icp_chart = $value['show_in_icp_chart'];
                    $table->is_active = $value['is_active'];
                    // dd($table);
                    $table->save();
                    if($form_id == 1){
                        // $value = $value['name'];
                        $value = str_replace(' ', '_', strtolower($value['input_label']));
                        Schema::table('officers', function (Blueprint $table) use ($value) {
                            // dd($value);
                            $table->string($value)->after('id')->nullable();
                        });
                    }
                }
                // else{
                //     echo "empty Data";
                // }
            }
        // return redirect()->route('form.index')
        //     ->with('success', 'From fields created successfully.');
        return redirect()->route('form_fields',$form_id)
            ->with('success', 'From fields create successfully.');
        // TemplateFormFields::create($request->all());

        // echo '<pre>';
        // print_r($request->all());
        // $form_id = $request->get('form_id');
        // $form_field_id = $request->get('form_field_id');
        // $label = $request->get('input_label');
        // $label_type = $request->get('label_type');
        // $field_type = $request->get('input_type');
        // $placeholder = $request->get('input_placeholder');
        // $value = $request->get('input_value');
        // $max_length = $request->get('input_max_length');
        // $is_active = $request->get('is_active');
        // $data =array_map(null,$form_id,$form_field_id,$label,$label_type,$field_type,$placeholder,$value,$max_length,$is_active);
        // dd($data);
        // dd($data[2][4]);

        // $request = $request->all();
        // $data = TemplateFormFields::create($request);
        // $table = array_map(function($personalId, $amount, $from, $to, $hours) {
        //        return new App\Timeslot($personalId, $amount, $from, $to, $hours);
        //    }, $request['personal_id'], $request['amount'], $request['from'], $request['to'], $request['hours']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
        if (View::exists('setup_form/edit')) {
            return View('setup_form/edit', compact('form'));
        } else {
            echo "This view file are not exist";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function showform(Request $request)
    {
        //
        $form_id = $request->id;
        $forms = Form::where('id', $form_id)->get();
        $form_data = TemplateFormFields::where('form_id', $form_id)->where('is_active', 1)->orderBy('position_id', 'asc')->get();
        // dd($form_data);
        if (View::exists('setup_form/form_template')) {
            return view('setup_form/form_template', compact('forms', 'form_data'));
        } else {
            echo "This viwe file are not exist";
        }
    }
    public function form_fields(Request $request)
    {
        $form_id = $request->id;
        // dd($form_id);
        $form_fields = TemplateFormFields::where('form_id', $form_id)->orderBy('position_id', 'asc')->get();
        // dd($form_fields);
        // $form_data = TemplateFormFields::where('form_id', $form_id)->get();
        // // dd($form_data);
        if (View::exists('setup_form/form_fields')) {
            return view('setup_form/form_fields', compact('form_fields','form_id'));
            // return view('setup_form/form_fields');
        } else {
            echo "This viwe file are not exist";
        }
    }
    public function edit_form_field(Request $request)
    {
        $field_id = $request->id;
        // // dd($field_id);
        $input_types = FormFieldtypes::where('form_field_id', 1)->where('is_active', 1)->get();
        $form_fields = TemplateFormFields::where('id', $field_id)->get();
        // dd($form_fields);
        // // $form_data = TemplateFormFields::where('form_id', $form_id)->get();
        // // // dd($form_data);
        if (View::exists('setup_form/edit_form_field')) {
            return view('setup_form/edit_form_field', compact('form_fields','input_types'));
            // return view('setup_form/edit_form_field');
        } else {
            echo "This viwe file are not exist";
        }
    }
    public function update_form_field(Request $request)
    {
        // dd($request->all());
        // echo 'update';
        $form_id = $request->get('form_id');
        $field_id = $request->get('field_id');
        $table = TemplateFormFields::find($field_id);
        // dd($table);
        $table->position_id = $request->get('sorting_position');
        // $table->form_id = $request->get('form_id');
        // $table->form_id = $form_id;
        // $table->form_field_id = $request->get('form_field_id');
        $table->label = $request->get('input_label');
        $table->label_type = $request->get('label_type');
        $table->field_type = $request->get('input_type');
        // $table->name = $request->get('name');
        $table->placeholder = $request->get('input_placeholder');
        $table->required = $request->get('required');
        $table->max_length = $request->get('input_min_length');
        $table->max_length = $request->get('input_max_length');
        $table->show_in_listing = $request->get('show_in_list');
        $table->show_in_icp_chart = $request->get('show_in_icp_chart');
        $table->is_active = $request->get('is_active');
        // dd($table);
        $table->save();
    
        return redirect()->route('form_fields',$form_id)
            ->with('success', 'From fields update successfully.');
    }
    public function show_status(Request $request)
    {
        $field_id = $request->id1;
        $get_form_id = TemplateFormFields::where('id',$field_id)->get('form_id');
        $form_id = $get_form_id[0]['form_id'];
        $field = $request->id2;
        $status = $request->id3;
        // echo $field_id ,'<br>';
        // echo $form_id ,'<br>';
        // echo $field ,'<br>';
        // echo $status ,'<br>';
        // exit;

        if($field == "show_in_listing")
        {
            $table = TemplateFormFields::find($field_id);
            $table->show_in_listing=$status;
            $table->save();
        }
        if($field == "show_in_icp_chart")
        {
            $table = TemplateFormFields::find($field_id);
            $table->show_in_icp_chart=$status;
            $table->save();
        }
        if($field == "is_active")
        {
            $table = TemplateFormFields::find($field_id);
            $table->is_active=$status;
            $table->save();
        }
        return redirect()->route('form_fields',$form_id)
        ->with('success', 'From fields update successfully.');
    }
    public function update_field_position(Request $request)
    {
        // dd($request->all());
        $form_id = $request->get('form_id');
        $total_position = TemplateFormFields::where('form_id',$form_id)->count();
        $old_position = TemplateFormFields::where('form_id', $form_id)->get('position_id');
        $get_id = TemplateFormFields::where('form_id', $form_id)->get('id');
        $new_position = $request->get('position');

        $i = 1;
        // echo count($get_id);
        // exit;
        foreach($new_position as $key => $id){
            $table = TemplateFormFields::find($id);
            $table->position_id = $i;
            $table->save();
            $i++;
        }
    }
    // public function status_icp_chart(Request $request)
    // {
    //     $field_id = $request->id;
    //     $get_form_id = TemplateFormFields::where('id',$field_id)->get('form_id');
    //     $form_id = $get_form_id[0]['form_id'];
    //     $status = $request->id2;
    //     $table = TemplateFormFields::find($field_id);
    //     $table->show_in_icp_chart=$status;
    //     $table->save();
    //     return redirect()->route('form_fields',$form_id)
    //     ->with('success', 'From fields update successfully.');
    // }
    // public function active_status(Request $request)
    // {
    //     $field_id = $request->id;
    //     $get_form_id = TemplateFormFields::where('id',$field_id)->get('form_id');
    //     $form_id = $get_form_id[0]['form_id'];
    //     $status = $request->id2;
    //     $table = TemplateFormFields::find($field_id);
    //     $table->is_active=$status;
    //     $table->save();
    //     return redirect()->route('form_fields',$form_id)
    //     ->with('success', 'From fields update successfully.');
    // }
}
