<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostImagesController extends Controller
{
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $file = $request->file('file');
        return '/storage/' . $file->store('posts/' . date('dmY'));
    }

    public function destroy(Request $request)
    {
        $files = json_decode($request->input('files'));
        foreach ($files as $file) {
            Storage::delete(str_replace('/storage/', '', $file));
        }
        return 'deleted';
    }
}
