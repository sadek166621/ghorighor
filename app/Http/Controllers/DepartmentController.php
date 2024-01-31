<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return  view('admin.department.department',[
            'departments'=>Department::all()
        ]);
    }
    public function saveDepartment(Request $request){
        $department = new Department();
        $department->department_name= $request->department_name;
        $department->department_code= $request->department_code;
        $department->publication_status= $request->publication_status;
        $department->save();
        return back();

    }
    public function statusDepartment($id){
        $department= Department::find($id);
        if ($department->publication_status == 1 ){
            $department->publication_status = 0;
            $department->save();
            return back()->with('message','Status Successfully');
        }else{
            $department->publication_status = 1;
            $department->save();
            return back()->with('message','Status Successfully');
        }
    }
    public function editDepartment($id){
        return  view('admin.department.edit-department',[
            'department'=>Department::find($id)
        ]);
    }
    public function updateDepartment(Request $request){
        $department =Department::find($request->id);
        $department->department_name= $request->department_name;
        $department->department_code= $request->department_code;
        $department->publication_status= $request->publication_status;
        $department->save();
        return redirect('/department');
    }
    public function deleteDepartment($id){
        $department=Department::find($id);
        $department->delete();
        return redirect('/department');

    }
}
