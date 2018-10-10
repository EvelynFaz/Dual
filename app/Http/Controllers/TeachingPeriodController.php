<?php

namespace App\Http\Controllers;

class TeachingPeriodController extends Controller
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

    function createTeachingPeriod(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataTeachingPeriod = $data['TeachingPeriod'];
            $teachingPeriod = TeachingPeriod::create([
                'description' => $dataTeachingPeriod ['description'],
                'start_date' => $dataTeachingPeriod['start_date'],
                'finish_date' => $dataTeachingPeriod ['finish_date'],
                'enrolled' => $dataTeachingPeriod ['enrolled'],
                'code' => $dataTeachingPeriod['code'],

            ]);
            return response()->json($teachingPeriod, 201);
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

    function updateTeachingPeriod(Request $request)
    {

            $data = $request->json()->all();
            $dataTeachingPeriod = $data['TeachingPeriod'];
            DB::beginTransaction();
            $response = TeachingPeriod::findOrFail($data['id'])->update([
                'description' => $dataTeachingPeriod ['description'],
                'start_date' => $dataTeachingPeriod['start_date'],
                'finish_date' => $dataTeachingPeriod ['finish_date'],
                'enrolled' => $dataTeachingPeriod ['enrolled'],
                'code' => $dataTeachingPeriod ['code'],


            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteTeachingPeriod(Request $request)
    {
      $teachingPeriod = TeachingPeriod::findOrFail($request->id)->delete();
        return response()->json($teachingPeriod,   201);
    }


}
