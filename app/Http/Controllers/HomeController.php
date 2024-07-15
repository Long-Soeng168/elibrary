<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slide;
use App\Models\Publication;
use App\Models\Video;
use App\Models\Image;
use App\Models\Audio;
use App\Models\Thesis;
use App\Models\Journal;
use App\Models\Article;
use App\Models\News;
use App\Models\Menu;
use Image as ImageCompress;

class HomeController extends Controller
{
    public function index() {

        // $items = Publication::with('publicationSubCategory')->get();
        // foreach($items as $item){
        //         $item->update([
        //             'publication_category_id' => $item->publicationSubCategory?->publication_category_id,
        //         ]);
        // }
        // $items = Thesis::with('major')->get();
        // foreach($items as $item){
            //         $item->update([
                //             'thesis_category_id' => $item->major?->thesis_category_id,
                //         ]);
                // }

        // return ($items);


        $items = Publication::all();

        foreach ($items as $item) {
            // Ensure the image attribute is set and valid
            if (!empty($item->image)) {
                // Image local path
                $imagePath = public_path('assets/images/publications/' . $item->image);

                // Check if the file exists before processing
                if (file_exists($imagePath)) {
                    // Define new path for saving the compressed image
                    $thumbPath = public_path('assets/images/publications/thumb/' . $item->image);

                    // Create image instance from local path
                    $img = ImageCompress::make($imagePath);

                    // Resize the image (maintaining aspect ratio) and compress
                    $img->resize(500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbPath, 75); // 75 is the quality percentage

                } else {
                    // Handle the case where the file does not exist
                    \Log::warning("Image file does not exist: " . $imagePath);
                }
            } else {
                // Handle the case where the image attribute is missing or empty
                \Log::warning("Publication item missing image attribute: " . $item->id);
            }
        }

    return 'Success';
        $slides = Slide::latest()->get();
        $publications = Publication::latest()->limit(12)->get();
        $videos = Video::latest()->limit(8)->get();
        $images = Image::latest()->limit(8)->get();
        $audios = Audio::latest()->limit(8)->get();
        $bulletins = News::latest()->limit(8)->get();
        $theses = Thesis::latest()->limit(12)->get();
        $journals = Journal::latest()->limit(12)->get();
        $articles = Article::latest()->limit(12)->get();
        return view('client.home', [
            'slides' => $slides,
            'publications' => $publications,
            'videos' => $videos,
            'images' => $images,
            'audios' => $audios,
            'bulletins' => $bulletins,
            'theses' => $theses,
            'journals' => $journals,
            'articles' => $articles,
        ]);
    }

    public function menu($id) {
        return view('client.menu_detail', [
            'item' => Menu::findOrFail($id),
        ]);
    }

    public function readCount($archive, $id) {

        if ($archive == 'publication') {
            $item = Publication::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'bulletin') {
            $item = News::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'article') {
            $item = Article::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'thesis') {
            $item = Thesis::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'journal') {
            $item = Journal::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }

        else {
            return response()->json(['success' => false], 404);
        }

    }

    public function downloadCount($archive, $id) {

        if ($archive == 'publication') {
            $item = Publication::findOrFail($id);
            $item->update([
                'download_count' => $item->download_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'bulletin'){
            $item = News::findOrFail($id);
            $item->update([
                'download_count' => $item->download_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'article'){
            $item = Article::findOrFail($id);
            $item->update([
                'download_count' => $item->download_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'thesis'){
            $item = Thesis::findOrFail($id);
            $item->update([
                'download_count' => $item->download_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }elseif($archive == 'journal'){
            $item = Journal::findOrFail($id);
            $item->update([
                'download_count' => $item->download_count + 1,
            ]);
            return response()->json(['success' => true], 200);
        }

        else {
            return response()->json(['success' => false], 404);
        }

    }
}
