<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    protected $social = null;

    public function __construct(Social $social)
    {
        $this->social = $social;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request){
        $rules = $this->social->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        $data['youtube'] = $request->youtube;
        $this->social->fill($data);
        $status = $this->social->save();
        if($status){
            request()->session()->flash('success','Changes made successfully.');
        } else {
            request()->session()->flash('error','Something went wrong!');
        }
        return redirect()->back();
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
        $this->social = $this->social->find($id);
        if(!$this->social) {
            request()->session()->flash('error','Error occured');
            return redirect()->back();
        }
        $rules = $this->social->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->social->fill($data);
        $success = $this->social->save();
        if($success){
            $request->session()->flash('success','Changes made successfully.');
        } else {
            $request->session()->flash('error','Something went wrong!');
        }
        return redirect()->back();
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
