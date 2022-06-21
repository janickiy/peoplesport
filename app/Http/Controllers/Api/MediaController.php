<?php

namespace App\Http\Controllers\Api;

use App\Helpers\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
        $disk = config('media-library.disk_name');

        if ($file = File::upload($request->file('upload'), $disk)) {
            return response()->json([
                'uploaded' => true,
                'url' => $file
            ]);
        }

        return response()->json([
            'uploaded' => false,
            'error' => [
                'message' => 'Не удалось загрузить изображение'
            ]
        ]);
    }
}
