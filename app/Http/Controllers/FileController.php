<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Resources\File as FileResource;

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

    public function show($resource)
    {
        //Get files

        $files = File::where('resource_id', $resource)->get();

        // Return collection of files as a resource
        
        if($files->count() == 0)
        {
            FileResource::withoutWrapping();
            return  response()->json('File not found!', 404);
            
        }

            FileResource::withoutWrapping();
            return FileResource::collection($files);
             
    }
}
