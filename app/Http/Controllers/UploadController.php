<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\ExcelUpload;

class UploadController extends Controller
{
    public function uploadExcel(Request $request)
    {
        $rules = array(
            'file' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            Session::flash('message', 'The input file is not valid.');
            return Redirect::back();
        }
        else
        {
            try {
                Excel::load(Input::file('file'), function ($reader) {
                    foreach ($reader->toArray() as $row) {
                        ExcelUpload::firstOrCreate($row);
                    }
                });
                Session::flash('message', 'Uploaded successfully.');
                return Redirect::back();
            } catch (Exception $e) {
                Session::flash('message', $e->getMessage());
                return Redirect::back();
            }
        }
    }
}
