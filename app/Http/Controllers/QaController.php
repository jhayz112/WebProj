<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qa;




class QaController extends Controller
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
        $qas = qa::latest()->paginate(5);
        return view('qa.index',compact('qas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qa.create');
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
    
        qa::create($request->all());
     
        return redirect()->route('qa.index')
                        ->with('success','Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(qa $qa) 
    {
        return view('qa.show',compact('qa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(qa $qa)
    {
        return view('qa.edit',compact('qa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qa $qa)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        $qa->update($request->all());
    
        return redirect()->route('qa.index')
                        ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(qa $qa)
    {
        $qa->delete();
    
        return redirect()->route('qa.index')
                        ->with('success','Job deleted successfully');
    }
}