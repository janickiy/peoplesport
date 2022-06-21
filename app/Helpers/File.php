<?php

namespace App\Helpers;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File
{
    static public function upload(UploadedFile $file, string $disk = 'public', string $collection = 'media')
    {
        try {
            $id = DB::select("show table status like 'media'")[0]->Auto_increment;

            $media = new Media([
                'model_type' => Media::class,
                'model_id' => $id,
                'uuid' => (string) Str::uuid(),
                'collection_name' => $collection,
                'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
                'file_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'disk' => $disk,
                'size' => $file->getSize(),
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
            ]);

            $media->save();

            if (!$file->storeAs($disk, $file->getClientOriginalName())) {
                throw new \Exception('Не удалось переместить файл');
            }

            return sprintf('/storage/%s', $file->getClientOriginalName());
        } catch (\Exception $e) {
            // ...
        }

        return '';
    }
}
