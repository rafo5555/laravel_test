<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $rows = Test::all();
        return view('test.index', compact('rows'));
    }

    public function create(){
        $statuses = Test::getStatuses();
        return view('test.create', compact('statuses'));
    }

    public function store(TestRequest $request){
        $count = Test::count();
        if($count < 7){
            Test::insert($request->except(['_token']));
            return redirect()->route('index');
        }else{
            return redirect()->back()->with(['message' => 'You can create maximum 7 rows']);
        }
    }

    public function edit($id){
        $row = Test::find($id);
        if(!$row){
            return view('errors.notFound');
        }
        $statuses = Test::getStatuses();
        return view('test.edit', compact('row', 'statuses'));
    }

    public function update($id, TestRequest $request){
        $message = null;
        if($request->ip() == env('ALLOWED_IP')){
            $row = Test::find($id);
            $row->update($request->except(['_token', '_method']));
        }else{
           $message = 'You are not allowed to update the row';
        }
        return redirect()->route('edit', ['id' => $id])->with(['message' => $message]);
    }

    public function destroy($id){
        Test::destroy($id);
        return redirect()->route('index');
    }
}
