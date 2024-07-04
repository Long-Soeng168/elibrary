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

class HomeController extends Controller
{
    public function index() {
        $slides = Slide::latest()->get();
        $publications = Publication::latest()->limit(6)->get();
        $videos = Video::latest()->limit(4)->get();
        $images = Image::latest()->limit(4)->get();
        $audios = Audio::latest()->limit(4)->get();
        $theses = Thesis::latest()->limit(6)->get();
        $journals = Journal::latest()->limit(6)->get();
        return view('client.home', [
            'slides' => $slides,
            'publications' => $publications,
            'videos' => $videos,
            'images' => $images,
            'audios' => $audios,
            'theses' => $theses,
            'journals' => $journals,
        ]);
    }
}
