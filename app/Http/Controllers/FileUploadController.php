<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Image;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the file
        $request->validate([
            'file' => 'required|file|max:10240', // max 10MB
        ]);

        // === Start Store File ===
        // try {
        //     $file = $request->file('file');
        //     $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
        //     $filePath = env('AWS_File_Path') . $filename;
        //     $uploadSuccess = Storage::disk('s3')->put($filePath, file_get_contents($file));
        //     if (!$uploadSuccess) {
        //         throw new \Exception('Failed to upload the file to S3.');
        //     }
        // } catch (\Exception $e) {
        //     session()->flash('error', ['Error: ' . $e->getMessage()]);
        //     return redirect()->back();
        // }
        // session()->flash('success', 'File uploaded successfully!');
        // return redirect()->back();
        // === End Store File ===


        // === Start Store Image and Thumb ===
        try {
            $file = $request->file('file');
            $filename = time() . str()->random(10) . '.' . $file->getClientOriginalExtension();
            // Process and upload the original image to S3
            $image = Image::make($file->getRealPath())->encode();
            $image_path =  env('AWS_File_Path') . '/' . $filename;
            $uploadSuccess = Storage::disk('s3')->put($image_path, $image);
            if (!$uploadSuccess) {
                throw new \Exception('Failed to upload the original image.');
            }
            // Process and upload the thumbnail to S3
            $image_thumb = Image::make($file->getRealPath())
                ->resize(400, null, function($resize) {
                    $resize->aspectRatio();
                })
                ->encode();
            $image_thumb_path = env('AWS_File_Path') . '/thumb/' . $filename;
            $thumbUploadSuccess = Storage::disk('s3')->put($image_thumb_path, $image_thumb);
            if (!$thumbUploadSuccess) {
                throw new \Exception('Failed to upload the thumbnail.');
            }

        } catch (\Exception $e) {
            session()->flash('error', ['Error: ' . $e->getMessage()]);
            return redirect()->back();
        }
        // === End Store Image and Thumb ===

        // Return the URL or any other response
        session()->flash('success', 'File Upload Successfully!');
        return redirect()->back();
    }

    public function create(){
        return view('upload_view');
    }

}
