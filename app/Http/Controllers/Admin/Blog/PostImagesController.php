<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Handlers\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function destroy(Request $request, ImageManager $manager)
    {
        $manager->delete(json_decode($request->input('files')));
        return 'deleted';
    }
}
