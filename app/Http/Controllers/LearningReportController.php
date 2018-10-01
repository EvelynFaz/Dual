<?php

namespace App\Http\Controllers;

class LearningReportController extends Controller
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

    function createLearningReport(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataLearningReport = $data['LearningReport'];
            $learningReport = LearningReport::create([
                'week' => $data ['week'],
                'qualification' => $data['qualification'],
                'date_delivery' => $data ['date_delivery'],
                'reflection' => $data ['reflection'],
                'observations' => $data ['observations'],
                'priority' => $data ['priority'],
            ]);
            return response()->json($learningReport, 201);
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

    function updateLearningReport(Request $request)
    {

            $data = $request->json()->all();
            $dataLearningReport = $data['LearningReport'];
            DB::beginTransaction();
            $response = LearningReport::findOrFail($data['id'])->update([
                'week' => $data ['week'],
                'qualification' => $data['qualification'],
                'date_delivery' => $data ['date_delivery'],
                'reflection' => $data ['reflection'],
                'observations' => $data ['observations'],
                'priority' => $data ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteLearningReport(Request $request)
    {
      $user = LearningReport::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
