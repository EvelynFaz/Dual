<?php

namespace App\Http\Controllers;

class ProjectPlanBusinesController extends Controller
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

    function createProjectPlanBusines(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataProjectPlanBusines = $data['ProjectPlanBusines'];
            $projectPlanBusines = ProjectPlanBusines::create([
                'type' => $data ['type'],
                'analysis' => $data['analysis'],
                'objective' => $data ['objective'],
                'description' => $data ['description'],
                'indicator' => $data ['indicator'],
                'measurement' => $data ['measurement'],
                'goal' => $data ['goal'],
                'data_source' => $data ['data_source'],
                'budget' => $data ['budget'],
                'expected_benefits' => $data ['expected_benefits'],
                'priority' => $data ['priority'],



            ]);
            return response()->json($projectPlanBusines, 201);
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

    function updateProjectPlanBusines(Request $request)
    {

            $data = $request->json()->all();
            $dataProjectPlanBusines = $data['Objectt'];
            DB::beginTransaction();
            $response = ProjectPlanBusines::findOrFail($data['id'])->update([
                'type' => $data ['type'],
                'analysis' => $data['analysis'],
                'objective' => $data ['objective'],
                'description' => $data ['description'],
                'indicator' => $data ['indicator'],
                'measurement' => $data ['measurement'],
                'goal' => $data ['goal'],
                'data_source' => $data ['data_source'],
                'budget' => $data ['budget'],
                'expected_benefits' => $data ['expected_benefits'],
                'priority' => $data ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteProjectPlanBusines(Request $request)
    {
      $user = ProjectPlanBusines::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
