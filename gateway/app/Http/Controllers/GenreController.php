<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GenreController extends Controller
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = env('MICROSERVICIO_BANDAS');
        $this->apiKey = env('API_KEY');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->apiUrl . '/genres';
        $response = Http::withHeaders(['X-API-KEY' => $this->apiKey])->get($url);
        return $response->json();
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
        $url = $this->apiUrl . '/genres/' . $id;
        $response = Http::withHeaders(['X-API-KEY' => $this->apiKey])->get($url);
        return $response->json();
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
