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

    public function stream($archive,$id, $file_name)
    {
        // Ensure that only authorized users can access the stream
        // if (!auth()->check()) {
        //     abort(403);
        // }
        if ($archive == 'publication') {
            $filePath = public_path('assets/pdf/publications/'.$file_name);
        }elseif($archive == 'bulletin') {
            $filePath = public_path('assets/pdf/news/'.$file_name);
        }elseif($archive == 'article') {
            $filePath = public_path('assets/pdf/articles/'.$file_name);
        }elseif($archive == 'thesis') {
            $filePath = public_path('assets/pdf/theses/'.$file_name);
        }elseif($archive == 'journal') {
            $filePath = public_path('assets/pdf/journal/'.$file_name);
        }

        if (!file_exists($filePath)) {
            abort(404); // File not found
        }

        $stream = new \Symfony\Component\HttpFoundation\StreamedResponse(function () use ($filePath) {
            $stream = fopen($filePath, 'r');
            fpassthru($stream);
            fclose($stream);
        });

        $stream->headers->set('Content-Type', 'application/pdf');
        $stream->headers->set('Content-Length', filesize($filePath));

        return $stream;
    }

    public function viewPdf($archive, $id, $file_name)
    {
        // Ensure that only authorized users can access the stream
        // if (!auth()->check()) {
        //     abort(403);
        // }
        // dd($id, $archive);
        if ($archive == 'publication') {
            $item = Publication::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
        }elseif($archive == 'bulletin') {
            $item = News::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
        }elseif($archive == 'article') {
            $item = Article::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
        }elseif($archive == 'thesis') {
            $item = Thesis::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
        }elseif($archive == 'journal') {
            $item = Journal::findOrFail($id);
            $item->update([
                'read_count' => $item->read_count + 1,
            ]);
        }

        return view('client.view_pdf', [
            'archive' => $archive,
            'id' => $id,
            'file_name' => $file_name
        ]);

    }

    public function downloadPdf($archive, $id, $file_name)
    {
        // Ensure that only authorized users can access the download
        // if (!auth()->check()) {
        //     abort(403);
        //     return;
        // }

        if ($archive == 'publication') {
            $filePath = public_path('assets/pdf/publications/'.$file_name);
        } elseif ($archive == 'bulletin') {
            $filePath = public_path('assets/pdf/news/'.$file_name);
        } elseif ($archive == 'article') {
            $filePath = public_path('assets/pdf/articles/'.$file_name);
        } elseif ($archive == 'thesis') {
            $filePath = public_path('assets/pdf/theses/'.$file_name);
        } elseif ($archive == 'journal') {
            $filePath = public_path('assets/pdf/journal/'.$file_name);
        }

        if (!file_exists($filePath)) {
            abort(404); // File not found
        }

        return response()->download($filePath, $file_name, [
            'Content-Type' => 'application/pdf',
        ]);

    }

}
