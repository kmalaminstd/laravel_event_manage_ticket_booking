<?php

namespace App\Services;

use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class ImageUploadService{
    public function upload($file, $folder = "/media"){
        $path = $file->store($folder, 'public');
        return $path;
    }

    public function delete($path){
        if($path && Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }

    public function replace($file, $oldPath = null, $folder = "/media"){
        if($oldPath){
            $this->delete($oldPath);
        }

        return $this->upload($file, $folder);
    }
}
