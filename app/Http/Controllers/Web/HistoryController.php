<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\History;
use App\File;
use App\User;
use App\Department;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $histories = History::orderBy('id', 'asc')->where('status', 'borrowed')->paginate(10);
        return view('pages.admin.histories.list', ['histories' => $histories]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returned()
    {
        //
        $histories = History::orderBy('id', 'asc')->where('status', 'returned')->paginate(10);
        return view('pages.admin.histories.returned', ['histories' => $histories]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function due()
    {
        //

        $mytime = Carbon::now(); 
        $histories = History::orderBy('id', 'asc')->where('status','!=','returned')->whereDate('returned_date', '<=', $mytime)->paginate(10);
        return view('pages.admin.histories.due', ['histories' => $histories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $units  = Unit::all();
        $users  = User::all();
        $files  = File::where('status', 'available')->get();
        return view('pages.admin.histories.create', compact('units', 'users', 'files'));
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
            'unit_from_id' => 'required',
            'file_id' => 'required',
            'unit_to_id' => 'required',
            'sender_id' => 'required',
            'collector_id' => 'required',
            'reciever_id' => 'required',
            'issue_date' => 'required',
            'returned_date' => 'required',
        ];

        $customMessages = [
            'unit_from_id' => 'Choose current file Location',
            'unit_to_id' => 'Choose file destination',
            'file_id' => 'Choose file',
            'sender_id' => 'Choose the person issuing the File',
            'collector_id' => 'Choose the person file is issued to',
            'reciever_id' => 'Choose the Receiver of the File',
            'issue_date' => 'choose  the issue date',
            'returned_date' => 'Choose the expected return date',
        ];

        $this->validate($request, $rules, $customMessages); 

        History::create($request->all());
        $file = File::findOrFail($request['file_id']);
        $file->status = "not_available"; 
        $file->update();
        notify()->success("Successfully created!","","bottomRight");

        return redirect('histories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        $units  = Unit::all();
        $users  = User::all();
        $files  = File::all();
        return view('pages.admin.histories.edit', compact('history','units', 'users', 'files'));
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
        $history = History::findOrFail($id);
        $history->status = "returned";
        $history->update();
        notify()->success("Successfully Returned File!","","bottomRight");
        return redirect()->route('histories.show',$history->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history){

        $rules = [
            'unit_from_id' => 'required',
            'unit_to_id' => 'required',
            'sender_id' => 'required',
            'collector_id' => 'required',
            'reciever_id' => 'required',
            'issue_date' => 'required',
            'returned_date' => 'required',
        ];

        $customMessages = [
            'unit_from_id' => 'Choose current file Location',
            'unit_to_id' => 'Choose file destination',
            'sender_id' => 'Choose the person issuing the File',
            'collector_id' => 'Choose the person file is issued to',
            'reciever_id' => 'Choose the Receiver of the File',
            'issue_date' => 'Insert the issue date',
            'returned_date' => 'Choose the expected return date',
        ];

        $this->validate($request, $rules, $customMessages);

        $history->update($request->all());

        notify()->success("Successfully Updated!","","bottomRight");
        return redirect()->route('histories.show',$history->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        $history->delete();

        notify()->success("Successfully Deleted!","","bottomRight");
        return redirect('histories');
    }
}
