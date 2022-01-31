<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::orderBy('id','desc')->paginate(5);
        return view('accounts.index', compact('accounts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
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
            'name' => 'required|string',
        ]);
        $account = Account::create([
            'name' => $request->name
        ]);
        return redirect()->route('accounts.index')
            ->with('success','Account has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('accounts.show',compact('account'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('accounts.edit',compact('account'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Account $account)
    {
        $request->validate([
            'name' => 'required|unique:accounts,name,' .$account->id,
        ]);
        $account->update([
            'name' => $request->name
        ]);

        return redirect()->route('accounts.index')
            ->with('success','Account Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')
            ->with('success','Account has been deleted successfully');
    }


    // Get Records In All Tables
    public function getAllRecords() {

        $accounts = Account::with('projects.tasks', 'projects.jobs')->get();
//        dd($accounts);
        return view('get-all-records',compact('accounts'));

    }

    // Get All tasks To Project < 100
    public function getTasks() {

//        return view('get-tasks',compact('account'));

    }

}
