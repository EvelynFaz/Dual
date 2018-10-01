<?php

namespace App\Http\Controllers;

class ObjectController extends Controller
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

    function createObject(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataObject = $data['Object'];
            $object = Object::create([
                'description' => $data ['description'],
                'level_achievement_expected' => $data['level_achievement_expected'],
                'level_achievement_reached' => $data ['level_achievement_reached'],
                'homework' => $data ['homework'],
                'Post_Learning' => $data ['Post_Learning'],
                'week_learning' => $data ['week_learning'],
                'week' => $data ['week'],
                'responsible' => $data ['responsible'],
                'priority' => $data ['priority'],

            ]);
            return response()->json($object, 201);
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

    function updateObjectt(Request $request)
    {

            $data = $request->json()->all();
            $dataObject = $data['Object'];
            DB::beginTransaction();
            $response = Object::findOrFail($data['id'])->update([
                'description' => $data ['description'],
                'level_achievement_expected' => $data['level_achievement_expected'],
                'level_achievement_reached' => $data ['level_achievement_reached'],
                'homework' => $data ['homework'],
                'Post_Learning' => $data ['Post_Learning'],
                'week_learning' => $data ['week_learning'],
                'week' => $data ['week'],
                'responsible' => $data ['responsible'],
                'priority' => $data ['priority'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteObject(Request $request)
    {
      $user = Object::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
