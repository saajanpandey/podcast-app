<?php

namespace App\Traits;

use File;
use Request;
use Image;


trait ImageTrait
{
    public function uploadImage($dir, $input)
    {
        // dd($input, $dir);
        $directory = public_path() . $dir;
        if (is_dir($directory) != true) {
            \File::makeDirectory($directory, $mode = 0777, true);
        }
        $fileName = uniqid() . '.' . $input->getClientOriginalExtension();
        $input->move($directory, $fileName);
        return $fileName;
    }

    public function removeImage($dir, $image)
    {
        $f1 = public_path() . $dir . '/' . $image;
        File::delete($f1);
    }
}
