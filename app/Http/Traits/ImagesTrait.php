<?php

namespace App\Http\Traits;

trait ImagesTrait {
    public function uploadimg($file, $fileName, $path, $oldfile = null) {
        $file->move(public_path('images/' . $path), $fileName);
        if (!is_null($oldfile)) {
            unlink(public_path($oldfile));
        }
        return true;
    }
}