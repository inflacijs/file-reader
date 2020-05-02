<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store()
    {
        
        
        $attributes = request()->validate([
            'resource_id' => ['integer', 'required'],
            'file' => ['required']
        ]);

        $attributes['file'] = request('file')->store('files');

        File::create($attributes);

        
    }
}
