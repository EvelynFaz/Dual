<?php

namespace App\Http\Controllers;

class TutorController extends Controller
{


    function createStudentTutor(Request $request)
    {
        try {

            $data = $request ->json()->all();
            $dataStudent = $data['student'];
            $dataTutor = $data['tutor'];
            DB::beginTransaction();
            $tutor = Tutor::create([
                'first_name' => $dataStudent['first_name'],
                'last_name' => $dataStudent['last_name'],
            ]);

            $tutor->roles()->attach(1);
            $tutor->Tutor()->create([
                'type' =>$dataTutor ['type'],
            ]);


            DB::commit();
            return response()->json($tutor, 201);
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

    function crateTutor(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataTutor = $data['tutor'];
            DB::beginTransaction();
            $tutor = Tutor::create([
                'type' => strtoupper($dataTutor[ 'type']),


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


    function updateTutor(Request $request)
    {
        try {
            $dataTutor = $request->json()->all();
            $tutor = ProfessionalReference::findOrFail($dataTutor['id'])->update([
                'first_name' => $dataTutor[first_name],
                'last_name' => $dataTutor[last_name],
            ]);
            return response()->json($tutor, 201);
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





    function deleteTutor(Request $request)
    {
        try {
            $tutor = Tutor::findOrFail($request->id)->delete();
            return response()->json($tutor, 201);
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