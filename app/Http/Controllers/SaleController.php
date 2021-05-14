<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sale;




class SaleController extends Controller
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
        $sales = sale::latest()->paginate(5);
        return view('sale.index',compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sale.create');
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
    
        sale::create($request->all());
     
        return redirect()->route('sale.index')
                        ->with('success','Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sale $sale) 
    {
        return view('sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(sale $sale)
    {
        return view('sale.edit',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sale $sale)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        $sale->update($request->all());
    
        return redirect()->route('sale.index')
                        ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        $sale->delete();
    
        return redirect()->route('sale.index')
                        ->with('success','Job deleted successfully');
    }
}