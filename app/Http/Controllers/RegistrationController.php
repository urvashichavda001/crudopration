<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    /**
     * Display a listing of registrations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $registrations = Registration::latest()->get();

        return response()->json($registrations);
    }

    /**
     * Store a newly created registration in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:registrations,email'],
            'phone_no' => ['required', 'string', 'max:20'],
            'hobby' => ['required', 'string', 'max:255'],
        ]);

        $registration = Registration::create($validated);

        return response()->json([
            'message' => 'Registration created successfully.',
            'data' => $registration,
        ], 201);
    }

    /**
     * Update the specified registration in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('registrations', 'email')->ignore($registration->id),
            ],
            'phone_no' => ['required', 'string', 'max:20'],
            'hobby' => ['required', 'string', 'max:255'],
        ]);

        $registration->update($validated);

        return response()->json([
            'message' => 'Registration updated successfully.',
            'data' => $registration,
        ]);
    }

    /**
     * Remove the specified registration from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return response()->json([
            'message' => 'Registration deleted successfully.',
        ]);
    }
}
