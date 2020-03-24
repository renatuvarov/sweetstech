<?php


namespace App\Handlers;


use Illuminate\Support\Facades\Storage;

class ImageManager
{
    public function delete($images): void
    {
        foreach ((array)$images as $image) {
            Storage::delete(str_replace('/storage/', '', $image));
        }
    }
}
