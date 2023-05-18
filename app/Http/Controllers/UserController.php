<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $kelas = Kelas::all();

        return view('users.index', compact('users', 'kelas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->save();

        return redirect('/users');
    }

    public function update_role(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->input('level') == 'siswa') {
            $siswa = new Siswa;
            $siswa->id_user = $id;
            $siswa->nisn = $request->input('nisn');
            $siswa->id_kelas = $request->input('id_kelas');
            $siswa->save();
        } else if($request->input('currentLevel') == "siswa"){
            $siswa = Siswa::where('id_user', $id)
            ->first();
            $siswa->delete();
        }

        $user->level = $request->input('level');

        $user->save();

        return response()->json(['status' => 'success', 'level' => $user->level]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/kelas');
    }
}
