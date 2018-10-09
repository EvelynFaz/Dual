<?php

namespace App\Http\Controllers;

class TrainingFrameworkPlanController extends Controller
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

    function createAcademicFormation(Request $request)
    {

        try {
            $data = $request->json()->all();
            $professional = Professional::findOrFail($request->professional_id);
            $response = $professional->academicFormations()->create([
                'priority' => $data['priority'],

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

    function createTrainingFrameworkPlan(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataTrainingFrameworkPlan = $data['Object'];
            $trainingFrameworkPlan = TrainingFrameworkPlan::create([

                'priority' => dataTrainingFrameworkPlan ['priority'],

            ]);
            return response()->json($trainingFrameworkPlan, 201);
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

    function updateTrainigFrameworkPlan(Request $request)
    {

            $data = $request->json()->all();
            $dataOTrainingFrameworkPlan = $data['TrainingFrameworkPlan'];
            DB::beginTransaction();
            $response = TrainingFrameworkPlan::findOrFail($data['id'])->update([

                'priority' => $data ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteTrainingFrameworkPlan(Request $request)
    {
      $user = TrainingFrameworkPlan::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
