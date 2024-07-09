<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        // print_r($departments);
        // die();
        return view('admin.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store data cara query builder
        $data = [
            'department_name' => $request->nama_department,
            'department_status' => $request->status_department,
        ];

        $simpan = DB::table('departments')->insert($data);
        if ($simpan) {
            return redirect('department')->with(['success' => 'Data Department Berhasil Disimpan']);
        } else {
            return redirect('department')->with(['warning' => 'Data Department Gagal Disimpan']);
        }


        //store data cara elouqent
        // $department = Department::create([
        //     'department_name' => $request->nama_department,
        //     'department_status' => $request->status_department
        // ]);

        // if ($department) {
        //     return redirect('department')->with(['success', 'Data Department Berhasil Disimpan']);
        // }else{
        //     return redirect('department')->with(['error', 'Data Department Gagal Disimpan']);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department, Request $request)
    {
        $id = $request->id_dept;
        $detail = DB::table('departments')->where('id', $id)->first();
        return view('admin.department.show', compact('detail'));        
        
        
        // print_r($detail);
        // die;


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department, $id)
    {
        $department = Department::findOrFail($id);
        // print_r($department); die;
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department, $id)
    {
        //update data dengan query builder
        $data = [
            'department_name' => $request->nama_department,
            'department_status' => $request->status_department,
        ];

        $simpan = DB::table('departments')->where('id', $id)->update($data);
        if ($simpan) {
            return redirect('department')->with(['success' => 'Data Department Berhasil Disimpan']);
        } else {
            return redirect('department')->with(['warning' => 'Data Department Gagal Disimpan']);
        }

        //update data dengan eloquent
        // $department = Department::where('id', $id)->update([
        //     'department_name' => $request->nama_department,
        //     'department_status' => $request->status_department
        // ]);

        // if ($department) {
        //     return redirect('department')->with(['success', 'Update Berhasil Disimpan']);
        // }else{
        //     return redirect('department')->with(['error', 'Update Gagal Disimpan']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department, $id)
    {
        $delete = DB::table('departments')->where('id', $id)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Deparment Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Deparment Gagal Dihapus']);
        }
    }
    public function destroy_lama(Department $department, $id)
    {
        $delete = DB::table('departments')->where('id', $id)->delete();
        if ($delete) {
            return Redirect::back()->with(['success' => 'Deparment Berhasil Dihapus']);
        } else {
            return Redirect::back()->with(['warning' => 'Deparment Gagal Dihapus']);
        }
    }
}
