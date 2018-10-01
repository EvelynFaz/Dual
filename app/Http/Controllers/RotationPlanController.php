<?php

namespace App\Http\Controllers;

class RotationPlanController extends Controller
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

    function createRotationPlan(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataRotationPlan = $data['RotationPlan'];
            $rotationPlan = RotationPlan::create([
                'theoretical_knowledge' => $data ['theoretical_knowledge'],
                'procedural_knowledge_attitudinal' => $data['procedural_knowledge_attitudinal'],
                'knowledge' => $data ['knowledge'],
                'priority' => $data ['priority'],

            ]);
            return response()->json($rotationPlan, 201);
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

    function updateRotationPlan(Request $request)
    {

            $data = $request->json()->all();
            $dataRotationPlan = $data['RotationPlan'];
            DB::beginTransaction();
            $response = RotationPlan::findOrFail($data['id'])->update([
                'theoretical_knowledge' => $data ['theoretical_knowledge'],
                'procedural_knowledge_attitudinal' => $data['procedural_knowledge_attitudinal'],
                'knowledge' => $data ['knowledge'],
                'priority' => $data ['priority'],


            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteRotationPlan(Request $request)
    {
      $user = RotationPlan::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
