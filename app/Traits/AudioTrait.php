<?php

namespace App\Traits;

use File;

trait AudioTrait
{
    public function uploadAudio($dir, $input)
    {
        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0777, true);
        }
        $fileName = uniqid() . '.' . $input->getClientOriginalExtension();
        $input->move($directory, $fileName);
        return $fileName;
    }

    public function removeAudio($dir, $audio)
    {
        $f1 = public_path() . $dir . '/' . $audio;
        File::delete($f1);
    }
}
