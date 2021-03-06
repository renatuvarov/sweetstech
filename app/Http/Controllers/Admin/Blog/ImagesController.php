<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Handlers\ImageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function upload(Request $request, ImageManager $manager)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        return $manager->load($request->file('file'), 'posts');
    }

    public function destroy(Request $request, ImageManager $manager)
    {
        $manager->delete(json_decode($request->input('files')));
        return 'deleted';
    }
}
