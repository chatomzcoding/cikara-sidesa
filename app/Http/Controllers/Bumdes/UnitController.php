<?php

namespace App\Http\Controllers\Bumdes;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit   = Unit::all();
        return view('pimpinan.unit.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validator::make($request, [
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     // 'password' => $this->passwordRules(),
        //     // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        // ])->validate();

        User::create([
            'name' => $request->nama_unit,
            'email' => $request->email,
            'level' => 'unit',
            'password' => Hash::make($request->password),
            ]);
            
        // ambil id yang sudah tersimpan
        $user = User::latest()->first();

        Unit::create([
            'user_id' => $user->id,
            'nama_unit' => $request->nama_unit,
            'manajer_unit' => $request->manajer_unit,
            'staf_unit' => $request->staf_unit,
            'logo_unit' => $request->logo_unit,
        ]);
        return redirect()->back()->with('ds','Unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Unit::where('id',$request->id)->update([
            'nama_unit' => $request->nama_unit,
            'manajer_unit' => $request->manajer_unit,
            'staf_unit' => $request->staf_unit,
        ]);

        return redirect()->back()->with('du','Unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        User::find($unit->user_id)->delete();
        $unit->delete();

        return redirect()->back()->with('dd','Unit');

    }
}
