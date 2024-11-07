<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Publication;
use App\Models\Jstor;
use App\Models\PublicationImage;

class ClientPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.publications.index');
    }

    public function jstors()
    {
        return view('client.publications.jstor');
    }

    public function jstors_detail(string $id)
    {
        try {
            // Find the main publication item
            $item = Jstor::findOrFail($id);

            // Retrieve related publications excluding the item itself
            $related_items = Jstor::where('jstor_category_id', $item->jstor_category_id)
                ->where('id', '!=', $item->id) // Exclude the item itself
                ->inRandomOrder()
                ->limit(6)
                ->get();

            // Return the view with the data
            return view('client.publications.jstoe_detail', [
                'item' => $item,
                'related_items' => $related_items,
            ]);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the publication is not found
            return abort(404, 'Jstor not found.'); // Customize the error message as needed
        } catch (\Exception $e) {
            // Log the error or handle it accordingly
            return abort(500, 'An error occurred while retrieving jstor details.'); // Customize the error message as needed
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Find the main publication item
            $item = Publication::findOrFail($id);

            // Retrieve images related to the publication
            $multi_images = PublicationImage::where('publication_id', $id)
                                            ->latest()
                                            ->get();

            // Retrieve related publications excluding the item itself
            $related_items = Publication::where('publication_category_id', $item->publication_category_id)
                ->where('id', '!=', $item->id) // Exclude the item itself
                ->inRandomOrder()
                ->limit(6)
                ->get();

            // Return the view with the data
            return view('client.publications.show', [
                'item' => $item,
                'multi_images' => $multi_images,
                'related_items' => $related_items,
            ]);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the publication is not found
            return abort(404, 'Publication not found.'); // Customize the error message as needed
        } catch (\Exception $e) {
            // Log the error or handle it accordingly
            return abort(500, 'An error occurred while retrieving publication details.'); // Customize the error message as needed
        }
    }

    // The other methods (create, store, edit, update, destroy) can be similarly wrapped in try-catch if needed
}
