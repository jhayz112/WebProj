<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobile;




class MobileController extends Controller
{

    public function __construct()
	{
	    $this->middleware('auth');
	}

	public function dashboard(){
		//
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobiles = mobile::latest()->paginate(5);
        return view('mobile.index',compact('mobiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        mobile::create($request->all());
     
        return redirect()->route('mobile.index')
                        ->with('success','Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(mobile $mobile) 
    {
        return view('mobile.show',compact('mobile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mobile $mobile)
    {
        return view('mobile.edit',compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mobile $mobile)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        $mobile->update($request->all());
    
        return redirect()->route('mobile.index')
                        ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobile $mobile)
    {
        $mobile->delete();
    
        return redirect()->route('mobile.index')
                        ->with('success','Job deleted successfully');
    }
}