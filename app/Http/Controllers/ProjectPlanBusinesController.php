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
                'type' => $dataProjectPlanBusines ['type'],
                'analysis' => $dataProjectPlanBusines['analysis'],
                'objective' => $dataProjectPlanBusines ['objective'],
                'description' => $dataProjectPlanBusines ['description'],
                'indicator' => $dataProjectPlanBusines ['indicator'],
                'measurement' => $dataProjectPlanBusines ['measurement'],
                'goal' => $dataProjectPlanBusines ['goal'],
                'data_source' => $dataProjectPlanBusines ['data_source'],
                'budget' => $dataProjectPlanBusines ['budget'],
                'expected_benefits' => $dataProjectPlanBusines ['expected_benefits'],
                'priority' => $dataProjectPlanBusines ['priority'],



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
                'type' => $dataProjectPlanBusines ['type'],
                'analysis' => $dataProjectPlanBusines['analysis'],
                'objective' => $dataProjectPlanBusines ['objective'],
                'description' => $dataProjectPlanBusines ['description'],
                'indicator' => $dataProjectPlanBusines ['indicator'],
                'measurement' => $dataProjectPlanBusines ['measurement'],
                'goal' => $dataProjectPlanBusines ['goal'],
                'data_source' => $dataProjectPlanBusines ['data_source'],
                'budget' => $dataProjectPlanBusines ['budget'],
                'expected_benefits' => $dataProjectPlanBusines ['expected_benefits'],
                'priority' => $dataProjectPlanBusines ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteProjectPlanBusines(Request $request)
    {
      $projectPlanBusines = ProjectPlanBusines::findOrFail($request->id)->delete();
        return response()->json($projectPlanBusines,   201);
    }


}
