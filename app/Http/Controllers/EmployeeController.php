<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller 
{
    public function index(){
        $employees = Employee::all();
        
        return view('employees.index', compact('employees'));
    }
    
    public function create(){
        $departments = Department::all();
        $roles = Role::all();
        return view('employees.create', compact('departments', 'roles'));
    }

    public function store(Request $request){

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' =>'required|string|max:15',
            'address' => 'nullable|required',
            'birth_date' => 'required|date',
            'hire_date' => 'required|date',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'required|string',
            'salary' => 'required|numeric'
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee Created Successfully');
    }

    public function show($id){
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id){
        $employee = Employee::find($id);
        $departments = Employee::all();
        $roles = Employee::all();
        return view('employees.edit', compact('employee','departments', 'roles'));
    }
}
