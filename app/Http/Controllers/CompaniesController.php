<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\company;

class CompaniesController extends Controller
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
        $companies = company::orderBy('name','asc')->paginate(10);

        return view('companies.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name'=>'required',
            'email'=>'email',
            'website'=>'url',
            'logo'=>'min:0.29'
        ]);

        if($request->hasFile('logo')){
         //get file name with extension
          $fileNameWithExt = $request->file('logo')->getClientOriginalName();

          //get just file name
          $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

          //get just ext  
          $extension = $request->file('logo')->getClientOriginalExtension();

        //filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('logo')->storeAs('public/company_logo', $fileNameToStore);
        }

        $company = new company;

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $fileNameToStore;
        $company->website = $request->input('website');

        $company->save();

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
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = company::find($id);

        return view('companies.edit')->with('company',$company);
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
            'name'=>'required',
            'email'=>'email',
            'website'=>'url',
            'logo'=>'min:0.29'
        ]);

        if($request->hasFile('logo')){
            //get file name with extension
             $fileNameWithExt = $request->file('logo')->getClientOriginalName();
   
             //get just file name
             $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
   
             //get just ext  
             $extension = $request->file('logo')->getClientOriginalExtension();
   
           //filename to store
           $fileNameToStore = $filename.'_'.time().'.'.$extension;
           //upload image
           $path = $request->file('logo')->storeAs('public/company_logo', $fileNameToStore);
           }
   
           $company = company::find($id);
   
           $company->name = $request->input('name');
           $company->email = $request->input('email');
           if($request->hasFile('logo')){
           $company->logo = $fileNameToStore;
           }
           $company->website = $request->input('website');
   
           $company->save();
   
           return redirect('/company')->with('status','Data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = company::find($id);

        $company->delete();

        if($company->logo){
            Storage::delete('public/company_logo/'.$company->logo);
        }

        return redirect('/company')->with('status', 'Data Deleted');
    }
}
