<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     * @return JsonResponse
     */
    public function index()
    {
        try {
            $users = User::all();
            return response()->json(['status' => true, 'users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateRequest $request)
    {
        try {
            $user = User::create([
                'name'      => $request->input('name'),
                'cpf'       => $request->input('cpf'),
                'tipo'      => $request->input('tipo'),
                'telefone'  => $request->input('telefone'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password'))
            ]);
            return response()->json(['status' => true, 'users' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $users = User::find($id);
            return response()->json(['status' => true, 'users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
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
        try {
            $data = $request->all();
            $users = User::find($id);
            $users->update($data);
            return response()->json(['status' => true, 'users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $users = User::find($id);
            $users->delete();
            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function filterUsers(Request $request) {
        try {
            $query = User::query();

            if ($request->filled('not_tipo')) {
                $query->where('tipo', '!=', $request->not_tipo);
            }
            return response()->json(['status' => true, 'users' => $query->get()], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }
}
