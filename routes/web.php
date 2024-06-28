<?php

use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\WebsiteInfoController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\LecturerController;

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DtcController;
use App\Http\Controllers\Admin\SlideController;

/*
|--------------------------------------------------------------------------
*/
// Make storage:link
// Route::get('/symlink', function () {
//    $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
//    $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
//    symlink($target, $link);
//    echo "Done";
// });


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {

    Route::resource('publications', PublicationController::class);
    Route::get('publications_types', [PublicationController::class, 'types']);
    Route::get('publications_categories', [PublicationController::class, 'categories']);
    Route::get('publications_sub_categories', [PublicationController::class, 'sub_categories']);
    Route::get('publications_images/{id}', [PublicationController::class, 'images']);

    Route::resource('videos', VideoController::class);
    Route::get('videos_types', [VideoController::class, 'types']);
    Route::get('videos_categories', [VideoController::class, 'categories']);
    Route::get('videos_sub_categories', [VideoController::class, 'sub_categories']);
    Route::get('videos_images/{id}', [VideoController::class, 'images']);

    Route::resource('images', ImageController::class);
    Route::get('images_types', [ImageController::class, 'types']);
    Route::get('images_categories', [ImageController::class, 'categories']);
    Route::get('images_sub_categories', [ImageController::class, 'sub_categories']);
    Route::get('images_images/{id}', [ImageController::class, 'images']);

    Route::resource('audios', AudioController::class);
    Route::get('audios_types', [AudioController::class, 'types']);
    Route::get('audios_categories', [AudioController::class, 'categories']);
    Route::get('audios_sub_categories', [AudioController::class, 'sub_categories']);
    Route::get('audios_images/{id}', [AudioController::class, 'images']);

    Route::resource('bulletins', NewsController::class);
    Route::get('bulletins_types', [NewsController::class, 'types']);
    Route::get('bulletins_categories', [NewsController::class, 'categories']);
    Route::get('bulletins_sub_categories', [NewsController::class, 'sub_categories']);
    Route::get('bulletins_images/{id}', [NewsController::class, 'images']);

    Route::resource('theses', ThesisController::class);
    Route::get('theses_types', [ThesisController::class, 'types']);
    Route::get('theses_categories', [ThesisController::class, 'categories']);
    Route::get('theses_images/{id}', [ThesisController::class, 'images']);

    Route::resource('journals', JournalController::class);
    Route::get('journals_types', [JournalController::class, 'types']);
    Route::get('journals_categories', [JournalController::class, 'categories']);
    Route::get('journals_images/{id}', [JournalController::class, 'images']);


    Route::resource('keywords', KeywordController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('locations', LocationController::class);

    // ======================================================

    Route::resource('dashboard', DashboardController::class );
    Route::resource('users', AdminUserController::class );
    Route::resource('customers', CustomerController::class );
    Route::resource('items', ItemController::class );
    Route::resource('categories', CategoryController::class );
    Route::resource('types', TypeController::class );

    // Route::resource('settings', SettingsController::class );
    Route::resource('settings/menus', MenuController::class );
    Route::resource('settings/footer', FooterController::class );
    Route::resource('settings/links', LinkController::class );
    Route::resource('settings/databases', DatabaseController::class );
    Route::resource('settings/website_infos', WebsiteInfoController::class );

    Route::resource('people/authors', AuthorController::class);
    Route::resource('people/publishers', PublisherController::class);
    Route::resource('people/students', StudentController::class );
    Route::resource('people/supervisors', SupervisorController::class);
    Route::resource('people/lecturers', LecturerController::class);

    Route::resource('slides', SlideController::class);
    Route::resource('dtcs', DtcController::class);

    Route::get('addmore', function(){
        dd('Add More Route Test Success');
    })->name('addmore');
});



/*
|--------------------------------------------------------------------------
| End Admin Routes
|--------------------------------------------------------------------------
*/







Route::group([
    'middleware' => 'role:super-admin|admin'
], function() {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{id}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{id}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{id}/give-permissions', [RoleController::class, 'givePermissionsToRole']);
    Route::put('roles/{id}/give-permissions', [RoleController::class, 'updatePermissionsToRole']);

    Route::resource('users', UserController::class);
    Route::put('users/{user}/update-password', [UserController::class, 'updateUserPassword']);
    Route::get('users/{user}/delete', [UserController::class, 'destroy']);
});

Route::get('ckeditor4-demo', function() {
    return view('ckeditor-demo.ckeditor4-demo');
})->name('ckeditor4');

Route::get('ckeditor5-demo', function() {
    return view('ckeditor-demo.ckeditor5-demo');
})->name('ckeditor5');

Route::get('slide-infinite-loop', function() {
    return view('slide-show.slide-infinite-loop');
})->name('slide-infinite-loop');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});











Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
