<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    function createUser(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['user'];
            $user = User::create([
                'name' => $dataUser['name'],
                'user_name' => $dataUser['user_name'],
                'email' => $dataUser['email'],
                'api_token' => str_random(60),
                'password' => Hash::make($data['password']),
            ]);
            return response()->json($user, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (QueryException $e) {
            return response()->json($e, 500);
        } catch (Exception $e) {
            return response()->json('Exception', 500);
        } catch (Error $e) {
            return response()->json('Error', 500);
        }
    }

    function updateUser(Request $request)
    {

        $data = $request->json()->all();
        $dataUser = $data['user'];
        DB::beginTransaction();
        $response = User::findOrFail($data['id'])->update([
            'name' => $dataUser['name'],
            'user_name' => $dataUser['user_name'],
            'email' => $dataUser['email'],
            'password' => Hash::make($dataUser['password']),
            'api_token' => str_random(60),

        ]);
        DB::commit();
        return response()->json($response, 201);

    }


    function deleteUser(Request $request)
    {
        try {
            $user = User::findOrFail($request->id)->delete();
            return response()->json($user, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (Exception $e) {
            return response()->json('Exception', 500);
        } catch (Error $e) {
            return response()->json('Error', 500);
        }
    }
}