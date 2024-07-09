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

class HomeController extends Controller
{
    public function index() {
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
}
