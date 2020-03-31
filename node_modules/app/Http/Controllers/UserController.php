<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPermitted;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{

    protected $category = null;
    protected $user = null;
    protected $employee = null;
    protected $category_permitted = null;
    public function __construct(Category $category, User $user,Employee $employee, CategoryPermitted $category_permitted)
    {
        $this->category = $category;
        $this->user = $user;
        $this->employee = $employee;
        $this->category_permitted = $category_permitted;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = $this->user->get();
        return view('admin.pages.users', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = $this->category->get();
        return view('admin.pages.add_user', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->user->getRules();
        $request->validate($rules);
        $data = $request->all(); 
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['contact'] = $request->contact;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['image'] = $request->image;
        $this->user->fill($data);
        $status = $this->user->save();
        $user_id = $this->user->id;
        if($request->role == 'editor' && $status){
            $user_detail['address'] = $request->address;
            $user_detail['user_id'] = $user_id;
            $user_detail['DOB'] = $request->DOB;
            $user_detail['salary'] = $request->salary;
            $user_detail['slug'] = $request->slug;
            $user_detail['status'] = $request->status;  
            $this->employee->fill($user_detail); 
            $employee_status = $this->employee->save(); 
            if($employee_status){
                if(!empty($request->categories)){
                    foreach($request->categories as $cat_permitted){
                        CategoryPermitted::create([
                            'user_id' => $user_id,
                            'category_id' => $cat_permitted
                        ]);
                    }
                }

                $request->session()->flash('success','Editor created successfully.');
                
                return redirect()->route('users.index');

            }

        }      

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
        $data = $this->user->find($id);
        if(!$data) {
            request()->session()->flash('error','User not found');
            return redirect()->back();
        }
        $permitted = $this->category_permitted->where('user_id', $id)->get()->toArray();
        $employee_detail = $this->employee->where('user_id', $id)->first();
        $allCategories = $this->category->get();
        return view('admin.pages.add_user', compact('allCategories','data', 'permitted', 'employee_detail'));
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
        $request['user_id'] = $id; 
        $this->user = $this->user->find($id);
        if(!$this->user) {
            request()->session()->flash('error','User not found');
            return redirect()->back();
        }
        if($request->password == null){
            $request['password'] = $this->user->password;
        }
        $rules = $this->user->getRules('update');
        $request->validate($rules);
        $data = $request->all(); 
        $this->user->fill($data);
        $user_status = $this->user->save();
        if($user_status){
            if($this->user->role == 'editor'){
                $this->employee = $this->employee->where('user_id', $id)->first();
                if(!$this->employee) {
                    request()->session()->flash('error','User not found');
                    return redirect()->back();
                }
                $employee_rules = $this->employee->getRules('update');
                $request->validate($employee_rules);
                $employee_data = $request->all();
                $this->employee->fill($employee_data);
                $this->employee->save(); 
                $users_to_delete = $this->category_permitted->where('user_id', $id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $users_to_delete);
                DB::table('category_permitteds')->whereIn('id', $ids_to_delete)->delete();
                if(!empty($request->categories)){
                    foreach($request->categories as $cat_permitted){
                        CategoryPermitted::create([
                            'user_id' => $id,
                            'category_id' => $cat_permitted
                        ]);
                    }
                }
            }
        } 
        $request->session()->flash('success','User updated successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user = $this->user->find($id);
        if(!$this->user){
            request()->session()->flash('error','User Not found');
            return redirect()->route('users.index');
        }

        $success = $this->user->delete();
        if($success){
            request()->session()->flash('success','User deleted successfully.');
        } else {
            request()->session()->flash('error','Sorry! User could not be deleted at this moment.');
        }
        return redirect()->route('users.index');
    }
}
