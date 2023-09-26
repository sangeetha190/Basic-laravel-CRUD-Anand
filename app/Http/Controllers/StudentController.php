<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $student = Students::get();
        return view('Student.index', compact('student'));
    }
    public function about()
    {
        return view('Student.about');
    }
    public function create()
    {
        return view('Student.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'student_email' => 'required|email',
            'student_mobile_number' => 'required|digits:10',
        ]);

        $input = [
            'name' => $request['student_name'],
            'email' => $request['student_email'],
            'mobile_number' => $request['student_mobile_number']
        ];
        // dd($input);
        // stote the data to the DB
        Students::create($input);
        return redirect()->route('student.index')->with('success', 'Created Successfully');
    }
    public function edit($id)
    {
        $student = Students::find($id);
        return view('Student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name' => 'required',
            'student_email' => 'required|email',
            'student_mobile_number' => 'required|digits:10',
        ]);

        $input = [
            'name' => $request['student_name'],
            'email' => $request['student_email'],
            'mobile_number' => $request['student_mobile_number']
        ];
        // dd($input);
        // stote the data to the DB
        $updated = Students::find($id);
        $updated->update($input);
        return redirect()->route('student.index')->with('success', 'Updated Successfully')->with('color', '#D65108');
    }


    public function delete($id)
    {
        $delete_data =  Students::find($id);
        $delete_data->delete($delete_data);

        return redirect()->route('student.index')->with('success', 'Deleted Successfully')->with('color', '#db2b39');
    }
}
