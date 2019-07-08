<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\Department;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $units = Unit::orderBy('id', 'asc')->paginate(10);
        return view('pages.admin.units.list', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments  = Department::all();
        return view('pages.admin.units.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:units,name',
            'department_id' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Please provide the units\'s name.',
            'name.unique' => 'Unit name already exist.',
            'department_id' => 'Choose a department'
        ];

        $this->validate($request, $rules, $customMessages); 

        Unit::create($request->all());

        notify()->success("Successfully created!","","bottomRight");

        return redirect('units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $departments  = Department::all();
        return view('pages.admin.units.edit', compact('unit', 'departments'));
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
        $unit = Unit::findOrFail($id);
        $departments  = Department::all();
        return view('pages.admin.units.edit', compact('unit', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit){
        $rules = [
            'name' => [
                'required',
                Rule::unique('units')->ignore($unit->id),
            ],
            'department_id' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Please provide the unit\'s name.',
            'name.unique' => 'unit name already exist.',
            'department_id' => 'Select a valid department',
        ];

        $this->validate($request, $rules, $customMessages);

        $unit->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect()->route('units.show',$unit->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('units');
    }
}
