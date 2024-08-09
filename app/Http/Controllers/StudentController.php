<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Student::all();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "student_read";
                $updateGate = "student_update";
                $deleteGate = "student_delete";
                $route = "student";
                $primaryKey = "studentID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->editColumn('checkbox', function ($row) {
                return '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes" name="bulk_action" value='.$row->studentID. '></div>';
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => 'Student Index']
        ];

        return view('student.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => 'Student Create']
        ];

        return view('student.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create($request->all());
        return redirect()->route('student.index')->with('message', 'Student Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => 'Student Show']
        ];

        return view('student.show', compact( 'breadcrumbs', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['name' => 'Student Edit']
        ];

        return view('student.edit', compact('breadcrumbs', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('student.index')->with('message', 'Student Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('message', 'Student Deleted Successfully!!');
    }
}
