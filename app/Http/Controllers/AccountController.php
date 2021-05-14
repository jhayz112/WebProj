<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //
    }


}


class AccountController extends Controller
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
        $accounts = account::latest()->paginate(5);
        return view('account.index',compact('accounts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
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
    
        account::create($request->all());
     
        return redirect()->route('account.index')
                        ->with('success','Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(account $account) 
    {
        return view('account.show',compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        return view('account.edit',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        $request->validate([
            'jobhigh' => 'required',
            'jobdesc' => 'required',
            'qualification' => 'required',
            'competencies' => 'required',
            'techskill' => 'required',
            'additional' => 'required',
        ]);
    
        $account->update($request->all());
    
        return redirect()->route('account.index')
                        ->with('success','Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        $account->delete();
    
        return redirect()->route('account.index')
                        ->with('success','Job deleted successfully');
    }
}