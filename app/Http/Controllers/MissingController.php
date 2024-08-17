<?php

namespace App\Http\Controllers;

use App\Models\Missing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissingController extends Controller
{
    public function index()
    {
        $missings = Missing::orderBy('id', 'desc')->get();
        return view('auth.missing', compact('missings'));
    }

    public function create(Request $request)
    {
        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $imagePath = $request->image->storeAs('public/uploads/missing', $imageName);
            $path = '/storage/uploads/missing/' . $imageName;
        } else {
            $imagePath = null;
        }

        Missing::create([
            'name' => $request->name,
            'description' => $request->description,
            'missing_since' => Carbon::createFromFormat('m/d/Y', $request->missing_since)->format('Y-m-d'),
            'location' => $request->location,
            'contact_number' => $request->contact_number,
            'image' => $path,
        ]);
        return redirect('/missing');
    }
}
