<?php

namespace App\Http\Controllers;

use App\Models\SubDeparment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_department = DB::table('sub_departments')->get();
        return view('admin.sub_department.index', compact('sub_department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department = DB::table('departments')->get();
        return view('admin.sub_department.add', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'sub_department_name' => $request->nama_department,
            'sub_department_status' => $request->status_department,
            'department_id' => $request->department,
        ];

        $simpan = DB::table('sub_departments')->insert($data);
        if ($simpan) {
            return redirect('sub_department')->with(['success' => 'Data Department Berhasil Disimpan']);
        } else {
            return redirect('sub_department')->with(['warning' => 'Data Department Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubDeparment $subDeparment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubDeparment $subDeparment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubDeparment $subDeparment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubDeparment $subDeparment)
    {
        //
    }
}
