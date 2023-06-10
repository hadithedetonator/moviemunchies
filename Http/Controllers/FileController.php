<?php

namespace App\Http\Controllers;

use App\Models\filings;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function open_file_form(){
        return view ('Upload_file');
        }
    public function store_file(Request $req){
        $req->validate([
            'file'=> 'required|mimes:pdf,doc,docx,xlx,csv,jpg,png|max:4048']);
        $filename = time().'.'.$req->file->extension();
        $req->file->move('uploads', $filename);
        // $req->file->storeAs('public', $filename);



        $filewritter = new filings;
        $filewritter -> file = $filename;
        $filewritter->save();


        return redirect('file_upload');
}

public function show_file_data(){
    $data = filings::all();
    return view('display_file_data', compact('data'));
}

public function file_view($id){
    $data = filings::find($id);
    return view ('View_file', compact('data'));
    }


public function file_download($file){
    return response()->download(public_path('uploads/'.$file));
    }
        
    

}