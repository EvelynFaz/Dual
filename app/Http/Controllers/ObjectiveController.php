<?php

namespace App\Http\Controllers;

class ObjectiveController extends Controller
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

    function createObjective(Request $request)
    {
        try {
            $data = $request->json()->all();
            $objective = Objective::create([
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
            return response()->json($objective, 201);
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

    function updateObjective(Request $request)
    {

            $data = $request->json()->all();
            DB::beginTransaction();
            $response = Objective::findOrFail($data['id'])->update([
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




    function deleteObjective(Request $request)
    {
      $user = Objective::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
