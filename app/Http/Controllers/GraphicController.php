<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\graphic;




class GraphicController extends Controller
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
        $graphics = graphic::latest()->paginate(5);
        return view('graphic.index',compact('graphics'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('graphic.create');
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
    
        graphic::create($request->all());
     
        return redirect()->route('graphic.index')
                        ->with('success','Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(graphic $graphic) 
    {
        return view('graphic.show',compact('graphic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(graphic $graphic)
    {
        return view('graphic.edit',compact('graphic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, graphic $graphic)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        $graphic->update($request->all());
    
        return redirect()->route('graphic.index')
                        ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(graphic $graphic)
    {
        $graphic->delete();
    
        return redirect()->route('graphic.index')
                        ->with('success','Job deleted successfully');
    }
}