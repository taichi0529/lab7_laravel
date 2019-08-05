<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Upload\Store as StoreRequest;

class UploadController extends Controller
{
    public function store(StoreRequest $request)
    {
        $user = auth()->user();
        $directory = $user->id;
        $uploadedFile = $request->file('file');
//        $path = \Storage::disk('s3')->putFile($directory, $uploadedFile, 'public');
//        $uploadedUrl = \Storage::disk('s3')->url($path);
        $path = \Storage::disk('public')->putFile($directory, $uploadedFile);
        $uploadedUrl = \Storage::disk('public')->url($path);

        return ['url' => $uploadedUrl];
    }
}
