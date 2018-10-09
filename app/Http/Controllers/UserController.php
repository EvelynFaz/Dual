<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

       function createUser(Request $request)
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
    }


    function createTutorUser(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['user'];
            $dataTutor = $data['professional'];
            DB::beginTransaction();
            $user = User::create([
                'name' => strtoupper($dataUser['name']),
                'user_name' => $dataUser['user_name'],
                'email' => $dataUser['email'],
                'password' => Hash::make($dataUser['password']),
                'api_token' => str_random(60),
            ]);
            $user->roles()->attach(1);
            $user->Tutor()->create([
                'type' => $dataTutor['type'],

            ]);
            DB::commit();
            return $this->login($request);
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


    function createStudentUser(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['user'];
            $dataStudent = $data['student'];
            DB::beginTransaction();
            $user = User::create([
                'name' => strtoupper($dataUser['name']),
                'user_name' => $dataUser['user_name'],
                'email' => $dataUser['email'],
                'password' => Hash::make($dataUser['password']),
                'api_token' => str_random(60),
            ]);
            $user->roles()->attach(2);
            $user->student()->create([
                'first_name' => $dataStudent['first_name'],
                'last_name' => $dataStudent['last_name'],
            ]);
            DB::commit();
            return $this->login($request);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json('Exception', 500);
        } catch (Error $e) {
            return response()->json('Error', 500);
        }
    }


    function createFormativeEntityUser(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['user'];
            $dataFormativeEntity = $data['EntityFormative'];
            DB::beginTransaction();
            $user = User::create([
                'name' => strtoupper($dataUser['name']),
                'user_name' => $dataUser['user_name'],
                'email' => $dataUser['email'],
                'password' => Hash::make($dataUser['password']),
                'api_token' => str_random(60),
            ]);
            $user->roles()->attach(2);
            $user->FormativeEntity()->create([
                'name' => $dataFormativeEntity ['name'],
                'nature' => $dataFormativeEntity['nature'],
                'legal_representative' => $dataFormativeEntity ['legal_representative'],
                'ruc' => $dataFormativeEntity ['ruc'],
                'activity_economic' => $dataFormativeEntity ['activity_economic'],
                'email' => $dataFormativeEntity ['email'],
                'address' => $dataFormativeEntity ['address'],
                'phone' => $dataFormativeEntity ['phone'],

            ]);
            DB::commit();
            return $this->login($request);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (QueryException $e) {
            return response()->json($e, 400);
        } catch (Exception $e) {
            return response()->json('Exception', 500);
        } catch (Error $e) {
            return response()->json('Error', 500);
        }
    }




    function updateUser(Request $request)
    {

        try {
            $dataUser = $request->json()->all();
            $user = User::find($request->id)->update([
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