<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 /*   public function __construct()
    {
        //
    }

    //*/

    function createStudent(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataStudent = $data['Student'];
            $student = Student::create([
                'first_name' => $dataStudent ['first_name'],
                'last_name' => $dataStudent['last_name'],


            ]);
            return response()->json($student, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json($e, 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json($e, 405);
        } catch (QueryException  $e) {
            return response()->json($e, 405);
        } catch (Exception $e) {
            return response()->json($e, 500);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }

    function updateStudent(Request $request)
    {

            $data = $request->json()->all();
            $dataStudent = $data['Student'];
            DB::beginTransaction();
            $response = Student::findOrFail($data['id'])->update([
                'first_name' => $dataStudent ['first_name'],
                'last_name' => $dataStudent['last_name'],


            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteStudent(Request $request)
    {
      $student = Student::findOrFail($request->id)->delete();
        return response()->json($student,   201);
    }


}
