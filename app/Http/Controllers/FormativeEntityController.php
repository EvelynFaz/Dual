<?php

namespace App\Http\Controllers;

class FormativeEntityController extends Controller
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

    function createFormativeEntity(Request $request)
    {
        try {
            $data = $request ->json()->all();
            $dataActivityReportLearning = $data['ActivityReportLearning'];
            $dataFormativeEntity = $data['FormativeEntity'];
            $formativeEntity = FormativeEntity::where('user_id', $request->user_id)->first();
            $response = $formativeEntity->ActivityReportLearning()->create([

                'description' => $dataActivityReportLearning ['description'],
                'type' => $dataActivityReportLearning['type'],
                'date' => $dataActivityReportLearning ['date'],
                'hour_income' => $dataActivityReportLearning ['hour_income'],
                'departure_time' => $dataActivityReportLearning ['departure_time'],
                'hours_total' => $dataActivityReportLearning ['hours_total'],
                'priority' => $dataActivityReportLearning ['priority'],

                /* $data = $request->json()->all();
                 $dataFormativeEntity = $data['FormativeEntity'];
                 $formativeEntity = FormativeEntity::create([
                     'name' => $data ['name'],
                     'nature' => $data['nature'],
                     'legal_representative' => $data ['legal_representative'],
                     'ruc' => $data ['ruc'],
                     'activity_economic' => $data ['activity_economic'],
                     'email' => $data ['email'],
                     'address' => $data ['address'],
                     'phone' => $data ['phone'],*/


            ]);
            return response()->json($formativeEntity, 201);
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

    function updateFormativeEntity(Request $request)
    {

            $data = $request->json()->all();
            $dataFormativeEntity = $data['FormativeEntity'];
            DB::beginTransaction();
            $response = FormativeEntity::findOrFail($data['id'])->update([
                'name' => $data ['name'],
                'nature' => $data['nature'],
                'legal_representative' => $data ['legal_representative'],
                'ruc' => $data ['ruc'],
                'activity_economic' => $data ['activity_economic'],
                'email' => $data ['email'],
                'address' => $data ['address'],
                'phone' => $data ['phone'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteFormativeEntity(Request $request)
    {
      $user = FormativeEntity::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
