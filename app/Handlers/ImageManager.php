<?php

namespace App\Handlers;

use Exception;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Psr\Log\LoggerInterface;

class ImageManager
{
    /**
     * @var Filesystem
     */
    private $storage;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(Filesystem $storage, LoggerInterface $logger)
    {
        $this->storage = $storage;
        $this->logger = $logger;
    }

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
            try {
                $this->storage->delete($path = $this->preparePathToRemoval($image));
                $this->deleteDirIfEmpty($path);
            } catch (Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }
    }

    private function preparePathToRemoval(string $image): string
    {
        return str_replace($this->start(), '', $image);
    }

    private function deleteDirIfEmpty(string $path): void
    {
        $dir = str_replace(basename($path), '', $path);

        if (empty($this->storage->files($dir))) {
            $this->storage->deleteDirectory($dir);
        }
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
