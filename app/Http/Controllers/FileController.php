<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\File;

class FileController extends Controller
{
     public function download($id)
    {
        
        $dl = File::find($id);
       
        //return files;
        return Storage::download($dl->path);
        
    }
}
