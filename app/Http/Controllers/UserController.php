<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    function createAbility(Request $request)
    {
        try {
            $data = $request->json()->all();
            $professional = Professional::findOrFail($request->professional_id);
            if ($professional === FALSE) {
                return response()->json(['error' => 'Invalid parameters'], 406);
            }
            $response = $professional->abilities()->create([
                'description' => $data['description'],
                'written_level' => $data['written_level'],
                'spoken_level' => $data['spoken_level'],
                'reading_level' => $data['reading_level'],
            ]);
            return response()->json($response, 201);
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


          /*  function createUser(Request $request)
            {
                try {
                    $data = $request->json()->all();
                    $dataUser = $data['user'];
                    DB::beginTransaction();
                    $user = User::create([
                        'name' => $dataUser['name'],
                        'user_name' => $dataUser['user_name'],
                        'email' => $dataUser['email'],
                        'api_token' => str_random(60),
                        'password' => Hash::make($data['password']),
                    ]);
                    DB::commit();
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
            }*/



    function updateUser(Request $request)
    {

        try {
            $dataUser = $request->json()->all();
            $user = User::findOrFile($request->id)->update([
                'name' => $dataUser['name'],
                'user_name' => $dataUser['user_name'],
                'email' => $dataUser['email'],
                'api_token' => str_random(60),
                'password' => Hash::make($dataUser['password']),
            ]);

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