<?php

namespace App\Http\Controllers;

class ActivityReportLearningController extends Controller
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

    function createActivityReportLearning(Request $request)
    {
        try {
            $data = $request->json()->all();
            $activityReportLearning = ActivityReportLearning::create([
                'description' => $data ['description'],
                'type' => $data['type'],
                'date' => $data ['date'],
                'hour_income' => $data ['hour_income'],
                'departure_time' => $data ['departure_time'],
                'hours_total' => $data ['hours_total'],
                'priority' => $data ['priority'],

            ]);
            return response()->json($activityReportLearning, 201);
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

    function updateActivityReportLearning(Request $request)
    {

            $data = $request->json()->all();
            $dataActivityReportLearning = $data['ActivityReportLearning'];
            DB::beginTransaction();
            $response = ActivityReportLearning::findOrFail($data['id'])->update([
                'description' => $dataActivityReportLearning ['description'],
                'type' => $dataActivityReportLearning['type'],
                'date' => $data ['date'],
                'hour_income' => $data ['hour_income'],
                'departure_time' => $data ['departure_time'],
                'hours_total' => $data ['hours_total'],
                'priority' => $data ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteActivityReportLearning(Request $request)
    {
      $user = ActivityReportLearning::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
