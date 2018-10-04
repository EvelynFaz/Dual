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
                'first_name' => $dataStudent[first_name],
                'last_name' => $dataStudent[last_name],
            ]);

            $tutor->roles()->attach(1);
            $tutor->Tutor()->create([
                'type' =>$dataTutor [type],
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

    function updateTutor(Request $request)
    {
        $data = $request ->json()->all();
        $dataStudent = $data['student'];
        $dataTutor = $data['tutor'];
        $tutor = Tutor::where('user_id', $request->user_id)->first();
        $response = $tutor->student()->create([
            'type' => $dataTutor[type],
        ]);
        DB::beginTransaction();
        $response = Student::findOrFail($data['id'])->update([
            'first_name' => $dataStudent[first_name],
            'last_name' => $dataStudent[last_name],


        ]);
        DB::commit();
        return response()->json($response, 201);

    }

    function updateStudent(Request $request)
    {

        $data = $request->json()->all();
        $dataStudent = $data['student'];
        $dataTutor = $data['tutor'];
        $response = Student::findOrFail($dataStudent['id'])->update([
            'first_name' => $dataStudent[first_name],
            'last_name' => $dataStudent[last_name],
        ]);
        DB::beginTransaction();
        $response = Tutor::findOrFail($data['id'])->update([
            'type' => $dataTutor[type],



        ]);
        DB::commit();
        return response()->json($response, 201);

    }


    function deleteTutor(Request $request)
    {
        $user = Tutor::findOrFail($request->id)->delete();
        return response()->json($user, 201);
    }


}
