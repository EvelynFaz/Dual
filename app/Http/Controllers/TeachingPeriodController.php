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
                'description' => $data ['description'],
                'start_date' => $data['start_date'],
                'finish_date' => $data ['finish_date'],
                'enrolled' => $data ['enrolled'],
                'code' => $data ['code'],

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
                'description' => $data ['description'],
                'start_date' => $data['start_date'],
                'finish_date' => $data ['finish_date'],
                'enrolled' => $data ['enrolled'],
                'code' => $data ['code'],


            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteTeachingPeriod(Request $request)
    {
      $user = TeachingPeriod::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
