<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

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
        // Count various records
        $counts = [
            'publications' => Publication::count(),
            'videos' => Video::count(),
            'images' => Image::count(),
            'audios' => Audio::count(),
            'bulletins' => News::count(),
            'theses' => Thesis::count(),
            'journals' => Journal::count(),
            'articles' => Article::count(),
            'users' => User::count(),
            'publishers' => Publisher::count(),
            'authors' => Author::count(),
        ];

        $label = [];
        $data = [];

        // Fetch menu databases
        $menu_databases = Database::where('status', 1)
            ->orderBy('order_index', 'ASC')
            ->get();

        foreach ($menu_databases as $database) {
            if ($database->type == 'slug' && $database->status) {
                $label[] = $database->name;

                // Get count based on slug
                $slug = $database->slug;
                $data[] = $counts[$slug] ?? 0;
            }
        }

        // return $counts;

        return view('admin.dashboard.index', array_merge([
            'title' => 'Records'
        ], $counts, [
            'label' => $label,
            'data' => $data,
            'counts' => $counts,
        ]));
    }


            // Read and Download Count
            // $publicationReadCount = Publication::sum('read_count');
            // $imageReadCount = Image::sum('read_count');
            // $videoReadCount = Video::sum('read_count');
            // $audioReadCount = Audio::sum('read_count');
            // $newsReadCount = News::sum('read_count');
            // $articleReadCount = Article::sum('read_count');
            // $thesisReadCount = Thesis::sum('read_count');
            // $journalReadCount = Journal::sum('read_count');

            // return [
            //     $publicationReadCount,
            //     $imageReadCount,
            //     $videoReadCount,
            //     $audioReadCount,
            //     $newsReadCount,
            //     $articleReadCount,
            //     $thesisReadCount,
            //     $journalReadCount,
            // ];

            // // Download Count
            // $publicationJournalDownloadCount = Publication::sum('download_count');

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
