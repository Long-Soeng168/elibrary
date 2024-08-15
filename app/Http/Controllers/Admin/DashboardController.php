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

        // $readCounts = [
        //     'publications' => Publication::sum('read_count'),
        //     'videos' => Video::sum('read_count'),
        //     'images' => Image::sum('read_count'),
        //     'audios' => Audio::sum('read_count'),
        //     'bulletins' => News::sum('read_count'),
        //     'theses' => Thesis::sum('read_count'),
        //     'journals' => Journal::sum('read_count'),
        //     'articles' => Article::sum('read_count'),
        // ];

        $label = [];
        $data = [];

        // $readCountLabel = [];
        // $readCountData = [];

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

        // foreach ($menu_databases as $database) {
        //     if ($database->type == 'slug' && $database->status) {
        //         $readCountLabel[] = $database->name;

        //         // Get count based on slug
        //         $slug = $database->slug;
        //         $readCountData[] = $readCounts[$slug] ?? 0;
        //     }
        // }

        // return [
        //     'readCountLabel' => $readCountLabel,
        //     'readCountData' => $readCountData,
        // ];

        return view('admin.dashboard.index', array_merge([
            'title' => 'Records'
        ], $counts, [
            'label' => $label,
            'data' => $data,
            'counts' => $counts,
            // 'readCountLabel' => $readCountLabel,
            // 'readCountData' => $readCountData,
        ]));
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
