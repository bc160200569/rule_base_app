<?php

use App\Models\FormFieldtypes;
use App\Models\Navigation;
use App\Models\RoleHasNavigation;
use App\Models\RoleHasSubNavigation;
use App\Models\SubNavigation;
use Spatie\Permission\Models\Permission;
use App\Models\FormField;
use App\Models\TemplateFormFields;

if (!function_exists('navbar')) {
    function navbar()
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = Navigation::where('status', 1)->get();
        return $data;
    }
}

if (!function_exists('subnav')) {
    function subnav($id)
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = SubNavigation::where('nav_id', $id)->get();
        return $data;
    }
}
if (!function_exists('role_has_navigation')) {
    function role_has_navigation($id)
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = RoleHasNavigation::where('role_id', $id)->get();
        return $data;
    }
}
if (!function_exists('role_has_sub_navigation')) {
    function role_has_sub_navigation($id)
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = RoleHasSubNavigation::where('role_id', $id)->get();
        return $data;
    }
}
if (!function_exists('get_form_field_type')) {
    function get_form_field_type($id)
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = FormFieldtypes::where('id', $id)->get();
        return $data;
    }
}
if (!function_exists('get_form_field')) {
    function get_form_field($id)
    {
        // $data = array(
        //     'navigations'=>Navigation::where('status', 1)->get()
        // );
        $data = FormField::where('id', $id)->get();
        return $data;
    }
}
if (!function_exists('get_form_field_position')) {
    function get_form_field_position($id)
    {
        $count = TemplateFormFields::where('form_id', $id)->count();
        return $count;
    }
}