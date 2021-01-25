<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\User;
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
        return response()->json([
            'status' => 'ok',
            'status_code' => 200,
            'data' => $users
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            'status' => 'created',
            'status_code' => 201,
            'data' => 'Data has been added success'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 'accepted',
            'status_code' => 202,
            'data' => $user
        ], 202);
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
        // if($request->isMethod('patch')) {

        //     $this->validate($request, [
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required'
        //     ]);
        //     $user->first_name = $request->input('first_name');
        //     $user->first_name = $request->input('first_name');
        //     $user->first_name = $request->input('first_name');
        // }

        $user = User::find($id);
        // dd($user);
        $user->first_name = $request->first_name;
        // $user->first_name = $request->input('first_name');
        $user->last_name = $request->last_name;
        // $user->last_name = $request->input('last_name');
        $user->email = $request->email;
        // $user->email = $request->input('email');
        // dd($user);
        $user->save();
        return response()->json([
            'status' => 'accepted',
            'status_code' => 202,
            'data' => 'Data has been updated success'
        ], 202);
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
        return response()->json([
            'status' => 'accepted',
            'status_code' => '202',
            'data' => 'data has been deleted success'
        ], 202);
    }
}
