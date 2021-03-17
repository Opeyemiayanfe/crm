<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\company;
use App\Models\employee;
use DB;

class EmployeesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::table('employees')
            ->leftJoin('companies', 'companies.company_id', '=', 'employees.company_id')
            ->paginate(10);

        return view('employees.index')->with('employee', $employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companies = company::all();
        return view('employees.create')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
            'email'=>'email',
        ]);

        $employee = new employee;

        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');

        $employee->save();

        return redirect('/home')->with('status','Data created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $companies = company::all();

        $employee = employee::find($id);

        //get company id for each employee
        $empcomid = $employee['company_id'];
        
       $compname = company::find($empcomid);
        
        return view('employees.edit', compact('companies', 'employee', 'compname'));


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
        $this->validate($request,[

            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
            'email'=>'email',
        ]);

        $employee = employee::find($id);

        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->company_id = $request->input('company');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');

        $employee->save();

        return redirect('/employee')->with('status','Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);

        $employee->delete();

        return redirect('/employee')->with('status', 'Data Deleted');
    }
}
