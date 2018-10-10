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
                'career_coordinator' => $dataTracing ['career_coordinator'],
                'start_date' => $dataTracing['start_date'],
                'finish_date' => $dataTracing ['finish_date'],
                'hours_training' => $dataTracing ['hours_training'],


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
                'career_coordinator' => $dataTracing ['career_coordinator'],
                'start_date' => $dataTracing['start_date'],
                'finish_date' => $dataTracing ['finish_date'],
                'hours_training' => $dataTracing ['hours_training'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteTracing(Request $request)
    {
      $tracing = Tracing::findOrFail($request->id)->delete();
        return response()->json($tracing,   201);
    }


}
