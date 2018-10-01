<?php

namespace App\Http\Controllers;

class TracingController extends Controller
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

    function createTracing(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataTracing = $data['Tracing'];
            $tracing = Tracing::create([
                'career_coordinator' => $data ['career_coordinator'],
                'start_date' => $data['start_date'],
                'finish_date' => $data ['finish_date'],
                'hours_training' => $data ['hours_training'],


            ]);
            return response()->json($tracing, 201);
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

    function updateTracing(Request $request)
    {

            $data = $request->json()->all();
            $dataTracing = $data['Tracing'];
            DB::beginTransaction();
            $response = Tracing::findOrFail($data['id'])->update([
                'career_coordinator' => $data ['career_coordinator'],
                'start_date' => $data['start_date'],
                'finish_date' => $data ['finish_date'],
                'hours_training' => $data ['hours_training'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteTracing(Request $request)
    {
      $user = Tracing::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
