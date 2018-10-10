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


                $data = $request->json()->all();
                 $dataFormativeEntity = $data['FormativeEntity'];
                 $formativeEntity = FormativeEntity::create([
                     'name' => $dataFormativeEntity ['name'],
                     'nature' => $dataFormativeEntity['nature'],
                     'legal_representative' => $dataFormativeEntity ['legal_representative'],
                     'ruc' => $dataFormativeEntity ['ruc'],
                     'activity_economic' => $dataFormativeEntity ['activity_economic'],
                     'email' => $dataFormativeEntity ['email'],
                     'address' => $dataFormativeEntity ['address'],
                     'phone' => $dataFormativeEntity ['phone'],


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
                'name' => $dataFormativeEntity ['name'],
                'nature' => $dataFormativeEntity['nature'],
                'legal_representative' => $dataFormativeEntity ['legal_representative'],
                'ruc' => $dataFormativeEntity ['ruc'],
                'activity_economic' => $dataFormativeEntity ['activity_economic'],
                'email' => $dataFormativeEntity ['email'],
                'address' => $dataFormativeEntity ['address'],
                'phone' => $dataFormativeEntity ['phone'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteFormativeEntity(Request $request)
    {
      $formativeEntity = FormativeEntity::findOrFail($request->id)->delete();
        return response()->json($formativeEntity,   201);
    }


}
