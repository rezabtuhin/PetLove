<?php

namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Adoption;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class NgoController extends Controller
{
    public function index(): Factory|View|Application
    {
        $ngos = User::where('role', 'NGO')->get();
        return view('auth.ngo', compact('ngos'));
    }

    public function ngo(User $id): Factory|View|Application
    {
        $volunteers = Volunteer::select('person')->where('institution', $id->id);

        $persons = $volunteers->pluck('person');
        return view('auth.ind-ngo', compact('id', 'persons'));
    }

    public function create(User $id): RedirectResponse
    {
        $existingVolunteer = Volunteer::where('institution', $id->id)
            ->where('person', \Auth::user()->id)
            ->exists();

        if ($existingVolunteer) {
            return redirect()->back()->with('error', 'You are already a volunteer for this institution.');
        }

        Volunteer::create([
            'institution' => $id->id,
            'person' => \Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'You are now volunteer of ' . $id->name . '.');

    }

    public function adoption(User $id): Factory|View|Application
    {
        $pets = Adoption::where('listed_by', $id->id)->where('is_adopted', 0)->get();
        return view('auth.adoption', compact('id', 'pets'));
    }

    public function adopt(Adoption $id){
        $id->is_adopted = 1;
        $id->save();
        Adopt::create([
            'adoption_id' => $id->id,
            'user_id' => \Auth::user()->id,
        ]);
        return redirect('/ngo/adoption/'.$id->listed_by)->with('success', 'Pet adopted successful!');
    }
}
