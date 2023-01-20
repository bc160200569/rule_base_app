<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\RoleHasNavigation;
use App\Models\RoleHasSubNavigation;
use App\Models\SubNavigation;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use DB;
use Illuminate\Support\Facades\DB;
    
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    function __construct()
    {
         $this->middleware('permission:role-list', ['only' => ['index','show']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->get();
        return view('roles.index',compact('roles'))
            ->with('i');
        // $roles = Role::orderBy('id','DESC');
        // return view('roles.index',compact('roles'));

        // Add in view file
        // {!! $roles->render() !!}
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $navigations = Navigation::get();
        $sub_navigations = SubNavigation::get();
        // dd($navigations);

        return view('roles.create',compact('permission','navigations','sub_navigations'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        $roleId = $role->id;

        // Add data in Table Role_Has_Navigation
        $requestNavigations =  $request->input('navigations');
            foreach($requestNavigations as $navigations)
            {
                // dd($roleId);
                $navigation = new RoleHasNavigation;
                $navigation->role_id = $roleId;
                $navigation->navigation_id = $navigations;
                $navigation->save();
            }

        // Add data in Table Role_Has_Sub_Navigation
        $requestSubNavigations =  $request->input('sub_navigations');
            foreach($requestSubNavigations as $sub_navigations)
            {
                // dd($roleId);
                $navigation = new RoleHasSubNavigation();
                $navigation->role_id = $roleId;
                $navigation->sub_navigation_id = $sub_navigations;
                $navigation->save();
            }
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","allow_navigation.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        $roleNavigations = Navigation::join("role_has_navigations","role_has_navigations.navigation_id","=","navigations.id")
            ->where("role_has_navigations.role_id",$id)
            ->get();
        $roleSubNavigations = SubNavigation::join("role_has_sub_navigations","role_has_sub_navigations.sub_navigation_id","=","sub_navigations.id")
            ->where("role_has_sub_navigations.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions','roleNavigations','roleSubNavigations'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $navigations = Navigation::get();
        $sub_navigations = SubNavigation::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $roleNavigations = DB::table("role_has_navigations")->where("role_has_navigations.role_id",$id)
            ->pluck('role_has_navigations.navigation_id','role_has_navigations.navigation_id')
            ->all();
        $roleSubNavigations = DB::table("role_has_sub_navigations")->where("role_has_sub_navigations.role_id",$id)
            ->pluck('role_has_sub_navigations.sub_navigation_id','role_has_sub_navigations.sub_navigation_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions', 'navigations', 'roleNavigations', 'sub_navigations','roleSubNavigations'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $requestNavigations =  ($request->input('navigations'));
        // dd($requestNavigations);
        // // echo $id;
        // // exit;
        // foreach($requestNavigations as $navigations)
        // {
        //     // dd($navigations);
        //     $data = RoleHasNavigation::where('role_id',$id)->get();
        //     // dd($data);
        //     $navigation->nav_id = $navigations;
        //     $navigation->save();
        // }
        // exit;
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        // Update data in Table Role_Has_Sub_Navigation
        $role->syncPermissions($request->input('permission'));
        // $userIds = [1, 2];
        $role->rolenav()->sync($request->input('navigations'));
        $role->rolesubnav()->sync($request->input('sub_navigations'));

        // $requestNavigations =  $request->input('navigations');
        //     foreach($requestNavigations as $navigations)
        //     {
        //         // dd($roleId);
        //         $navigation = RoleHasNavigation::where('role_id',$id);
        //         $navigation->nav_id = $navigations;
        //         $navigation->save();
        //     }

        // // Update data in Table Role_Has_Sub_Navigation
        // $requestSubNavigations =  $request->input('sub_navigations');
        //     foreach($requestSubNavigations as $sub_navigations)
        //     {
        //         // dd($roleId);
        //         $navigation = RoleHasSubNavigation::where('role_id',$id);
        //         $navigation->sub_nav_id = $sub_navigations;
        //         $navigation->save();
        //     }
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}