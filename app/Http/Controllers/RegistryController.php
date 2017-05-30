<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registry;
use Illuminate\Support\Facades\Log;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regs = Registry::All();

        return response()->json([
            'regs' => $regs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            //'company' => 'required',
            //'document' => 'required',
            //'status' => 'required',
            //'unit' => 'required'
        ]);
        Log::info($request);
        $reg = Registry::create([
            
            'category' => $request->input('add.category'),
            'company' => $request->input('add.company'),
            'companysigned' => $request->input('add.companysigned'),
            'counterparty' => $request->input('add.counterparty'),
            'counterpartysigned' => $request->input('add.counterpartysigned'),
            'document' => $request->input('add.document'),
            'note' => $request->input('add.note'),
            'price' => $request->input('add.price'),
            'status' => $request->input('add.status'),
            'unit' => $request->input('add.unit')
        ]);
        //return back();
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
        $regid = Registry::find($id);

        return view('dog.show', compact('regid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
