<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    public function index(): Factory|View|Application
    {
        $clinics = User::where('role', 'clinic')
            ->with(['reviewsReceived' => function ($query) {
                $query->select('rated_to', \DB::raw('AVG(rating) as average_rating'))
                    ->groupBy('rated_to');
            }])
            ->get();
        return view('auth.clinic', compact('clinics'));
    }

    public function clinic($id){
        $clinic = User::where('id', $id)
            ->with(['reviewsReceived' => function ($query) {
                $query->select('rated_to', \DB::raw('AVG(rating) as average_rating'))
                    ->groupBy('rated_to');
            }])
            ->first();

        $reviews = Review::where('rated_to', $id)->get();
        return view('auth.ind-clinic', compact('clinic', 'reviews'));
    }

    public function post($id, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'rate' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        Review::create([
            'rated_by' => Auth::id(),
            'rated_to' => $id,
            'rating' => $validated['rate'],
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function appointment($id, Request $request): RedirectResponse
    {
        // Validate the input and specify the expected format for the date
        $validated = $request->validate([
            'appointment_date' => 'required|date_format:m/d/Y', // Specify the expected date format (MM/DD/YYYY)
        ]);

        // Convert the date format to 'Y-m-d' before saving
        $appointmentDate = Carbon::createFromFormat('m/d/Y', $validated['appointment_date'])->format('Y-m-d');

        // Save the appointment
        Appointment::create([
            'appointment_by' => auth()->id(), // ID of the logged-in user
            'appointment_in' => $id,     // ID of the clinic
            'appointment_date' => $appointmentDate, // Converted date
        ]);

        // Redirect or return back with success message
        return back()->with('success', 'Appointment successfully created!');
    }

}
