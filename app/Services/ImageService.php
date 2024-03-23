<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Exceptions\GeneralException;
use Image;

/**
* ImageService class.
*/
class ImageService 
{
    /**
     * Show the form for creating a new resource of image
     *
     * @return array
     */
    public function resizeImage(
        $file, 
        $path = null, 
        $name = null, 
        $withThumb = false, 
        $width = 200, 
        $height = 200
    ) {
        $response = [
            'name'  => null,
            'error' => true,
            'msg'   => null,
            'path'  => null
        ];

        try {
            $image = time() . '.' . $file->extension(); # generate random name
            if ($name) { $image = $name . '.' . $file->extension(); }  # pre defined name

            if ($withThumb) { $this->resizeImageToThumb($file, $path, $name); }

            $regular = Image::make($file->getRealPath());
            $regular
                ->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); })
                ->encode('jpg')
                ->stream();

            Storage::disk('public')->put( $path . DIRECTORY_SEPARATOR . $image, $regular, 'public');

            $response['name'] = $image;
            $response['error'] = false;

        } catch(\Exception $e) {
            Log::info($e->getMessage());

            $response['msg'] = $e->getMessage();

            throw new GeneralException(__('There was a problem uploading your image.'));
        }

        return $response;
    }

    /**
     * Show the form for creating a new resource in thumbnail
     *
     * @return array
     */
    public function resizeImageToThumb(
        $file, 
        $path = null, 
        $name = null, 
        $width = 100, 
        $height = 100
    ) {
        $response = [
            'name'  => null,
            'error' => true,
            'msg'   => null
        ];
        
        try {
            $thumbImage = 'thumb_' . $name . '.' . $file->extension();

            $img = Image::make($file->getRealPath());
            $img
                ->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); })
                ->encode('jpg')
                ->stream();

            Storage::disk('public')->put( $path . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . $thumbImage, $img, 'public');

            $response['name'] = $thumbImage;
            $response['error'] = false;
        } catch(\Exception $e) {
            Log::info($e->getMessage());

            $response['error'] = $e->getMessage();

            throw new GeneralException(__('There was a problem uploading your image.'));
        }

        return $response;
    }
    
    /**
     * Show the form for creating a new resource of image
     *
     * @return array
     */
    public function uploadImage(
        $file, 
        $path = null, 
        $name = null, 
        $withThumb = false, 
        $width = 200, 
        $height = 200
    ) {
        $response = [
            'name'  => null,
            'error' => true,
            'msg'   => null,
            'path'  => null
        ];

        try {
            $image = time() . '.' . $file->extension(); # generate random name
            if ($name) { $image = $name . '.' . $file->extension(); }  # pre defined name

            if ($withThumb) { $this->resizeImageToThumb($file, $path, $name); }

            $regular = Image::make($file->getRealPath());
            $regular
                ->encode('jpg')
                ->stream();

            Storage::disk('public')->put( $path . DIRECTORY_SEPARATOR . $image, $regular, 'public');

            $response['name'] = $image;
            $response['error'] = false;

        } catch(\Exception $e) {
            Log::info($e->getMessage());

            $response['msg'] = $e->getMessage();

            throw new GeneralException(__('There was a problem uploading your image.'));
        }

        return $response;
    }

    /**
     * Show the form for creating a new resource of image
     *
     * @return array
     */
    public function attireImage(
        $file, 
        $path = null, 
        $name = null, 
        $withThumb = false, 
        $width = 480, 
        $height = 720
    ) {
        $response = [
            'name'  => null,
            'error' => true,
            'msg'   => null,
            'path'  => null
        ];

        try {
            $image = time() . '.' . $file->extension(); # generate random name
            if ($name) { $image = $name . '.' . $file->extension(); }  # pre defined name

            if ($withThumb) { $this->resizeImageToThumb($file, $path, $name); }

            $regular = Image::make($file->getRealPath());
            $regular
                ->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); })
                ->encode('jpg')
                ->stream();

            Storage::disk('public')->put( $path . DIRECTORY_SEPARATOR . $image, $regular, 'public');

            $response['name'] = $image;
            $response['error'] = false;

        } catch(\Exception $e) {
            Log::info($e->getMessage());

            $response['msg'] = $e->getMessage();

            throw new GeneralException(__('There was a problem uploading your image.'));
        }

        return $response;
    }
}
