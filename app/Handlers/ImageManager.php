<?php

namespace App\Handlers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageManager
{
    public function load(UploadedFile $image, string $path): string
    {
        return $this->start() . $image->store($path . $this->end());
    }

    public function loadArray($images, string $path): array
    {
        return array_map(function ($item) use ($path) {
            return $this->load($item, $path);
        }, (array)$images);
    }

    public function delete($images): void
    {
        foreach ($images as $image) {
            Storage::delete($this->prepareToDelete($image));
        }
    }

    private function prepareToDelete(string $image): string
    {
        return str_replace($this->start(), '', $image);
    }

    private function start(): string
    {
        return '/storage/';
    }

    private function end(): string
    {
        return '/' . date('dmY');
    }
}
