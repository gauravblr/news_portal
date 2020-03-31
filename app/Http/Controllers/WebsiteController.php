<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{

    protected $website = null;
    protected $social = null;

    public function __construct(Website $website, Social $social)
    {
        $this->social = $social;
        $this->website = $website;
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
        //dd($request);
        $rules = $this->website->getRules();
        $request->validate($rules);
        $data = $request->all();
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['location'] = $request->location;
        $data['logo'] = $request->logo;
        $this->website->fill($data);
        $status = $this->website->save();
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
        $this->website = $this->website->find($id);
        if(!$this->website) {
            request()->session()->flash('error','Error occured');
            return redirect()->back();
        }
        $rules = $this->website->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->website->fill($data);
        $success = $this->website->save();
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

    public function sensitive(){
        $opening_hours = $this->opening->first();
        $social_info = $this->social->first();
        $website_info = $this->website->first();
        return view('admin.settings', compact('opening_hours','social_info','website_info'));
    }

    public function aboutData(Request $request, $id){
        $this->website = $this->website->find($id);
        if(!$this->website) {
            request()->session()->flash('error','Error occured');
            return redirect()->back();
        }
        $rules = $this->website->getRules();
        $request->validate($rules);
        $data = $request->all();
        $this->website->fill($data);
        $success = $this->website->save();
        if($success){
            $request->session()->flash('success','Changes made successfully.');
        } else {
            $request->session()->flash('error','Something went wrong!');
        }
        return redirect()->back();
    }
}