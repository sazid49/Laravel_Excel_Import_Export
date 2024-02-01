<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ExportUser;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function index()
    {   
        $users = User::query()->get();
        return view('welcome',compact('users'));
    }

    public function ImportUsers(Request $request)
    { 
        //  dd($request->all());
        Excel::import(new ImportUser, $request->file('file')->storeAs('files'));
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
}
