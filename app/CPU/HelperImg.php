<?php


namespace App\CPU;


class HelperImg
{
    public static function upload($file){
        $OriginalName = $file->getClientOriginalName();
//            $extension = $file->getclientoriginalextension();
        $fileName = time(). '_' . $OriginalName;
        $file->move('storage/app/public/products', $fileName);
        return $fileName ;
    }

}
