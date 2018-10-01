<?php

namespace App\Http\Controllers;

class TutorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*  public function __construct()
      {
          //
      }

      //*/

    function createTutor(Request $request)
    {
        try {
            $data = $request ->json()->all();
            $dataStudent = $data['student'];
            $dataTutor = $data['tutor'];
            $tutor = Tutor::where('user_id', $request->user_id)->first();
            $response = $tutor->student()->create([
                'first_name' => $dataStudent[first_name],
                'last_name' => $dataStudent[last_name],
            ]);
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

        $data = $request->json()->all();
        $dataTutor = $data['tutor'];
        DB::beginTransaction();
        $response = Tutor::findOrFail($data['id'])->update([
            'type' => $data['Type'],


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
