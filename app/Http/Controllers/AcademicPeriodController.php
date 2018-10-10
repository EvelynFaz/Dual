<?php

namespace App\Http\Controllers;

class academicPeriodController extends Controller
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

    function createAcademicPeriod(Request $request)
    {
        try {
            $data = $request->json()->all();
            $academicPeriod = AcademicPeriod::create([
                'description' => $data ['description'],

            ]);
            return response()->json($academicPeriod, 201);
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

    function updateAcademicPeriod(Request $request)
    {

            $data = $request->json()->all();
            DB::beginTransaction();
            $response = academicPeriod::findOrFail($data['id'])->update([
                'description' => $data ['description'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteAcademicPeriod(Request $request)
    {
      $academicPeriod = AcademicPeriod::findOrFail($request->id)->delete();
        return response()->json($academicPeriod,   201);
    }


}
