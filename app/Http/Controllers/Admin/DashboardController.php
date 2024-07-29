<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Publication;
use App\Models\Video;
use App\Models\Image;
use App\Models\Audio;
use App\Models\News;
use App\Models\Thesis;
use App\Models\Journal;
use App\Models\Article;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Database;


class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view dashboard', ['only' => ['index', 'show']]);
        // $this->middleware('permission:create dashboard', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update dashboard', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete dashboard', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicationsCount = Publication::count();
        $videosCount = Video::count();
        $imagesCount = Image::count();
        $audiosCount = Audio::count();
        $bulletinsCount = News::count();
        $thesesCount = Thesis::count();
        $journalsCount = Journal::count();
        $articlesCount = Article::count();

        $usersCount = User::count();
        $publishersCount = Publisher::count();
        $authorsCount = Author::count();

        $label = [];
        $data = [
            $publicationsCount,
            $videosCount,
            $imagesCount,
            $audiosCount,
            $bulletinsCount,
            $thesesCount,
            $journalsCount,
            $articlesCount,
        ];

        $menu_databases = Database::where('status', 1)->orderBy('id', 'ASC')->get() ?? new Database;

        foreach($menu_databases as $database){
            if($database->type == 'slug' && $database->status){
                $label[] = $database->name;
            }
        }

        return view('admin.dashboard.index', [
            'title' => 'Records',
            'publicationsCount' => $publicationsCount,
            'videosCount' => $videosCount,
            'imagesCount' => $imagesCount,
            'audiosCount' => $audiosCount,
            'bulletinsCount' => $bulletinsCount,
            'usersCount' => $usersCount,
            'publishersCount' => $publishersCount,
            'authorsCount' => $authorsCount,
            'thesesCount' => $thesesCount,
            'journalsCount' => $journalsCount,
            'articlesCount' => $articlesCount,
            'label' => $label,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
