<?php

namespace App\Http\Controllers;

class RoleController extends Controller
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

    function createRole(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataRole = $data['Role'];
            $role = Role::create([
                'description' => $data ['description'],
                'access' => $data['access'],

            ]);
            return response()->json($role, 201);
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

    function updateRole(Request $request)
    {

            $data = $request->json()->all();
            $dataRole = $data['Role'];
            DB::beginTransaction();
            $response = Role::findOrFail($data['id'])->update([
                'description' => $data ['description'],
                'access' => $data['access'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteRole(Request $request)
    {
      $user = Role::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
