<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApprovementRequest;
use App\Http\Requests\UpdateApprovementRequest;
use App\Models\Approvement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ApprovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApprovementRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Approvement $approvement): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Approvement $approvement): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApprovementRequest $request, Approvement $approvement): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Approvement $approvement): RedirectResponse
    {
        //
    }
}
