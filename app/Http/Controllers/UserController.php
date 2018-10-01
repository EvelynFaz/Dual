<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*  public function __construct()
      {
          //
      }

      //*/

    function createUser(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataUser = $data['User'];
            $user = User::create([
                'name' => $data['name'],
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'api_token' => $data['api_token'],
                'password' => $data['password'],

            ]);
            return response()->json($user, 201);
        } catch (ModelNotFoundException $e) {
            return response()->json('ModelNotFound', 405);
        } catch (NotFoundHttpException  $e) {
            return response()->json('NotFoundHttp', 405);
        } catch (QueryException $e) {
            return response()->json($e, 500);
        } catch (Exception $e) {
            return response()->json('Exception', 500);
        } catch (Error $e) {
            return response()->json('Error', 500);
        }
    }

    function updateUser(Request $request)
    {

        $data = $request->json()->all();
        $dataUser = $data['user'];
        DB::beginTransaction();
        $response = User::findOrFail($data['id'])->update([
            'type' => $data['Type'],


        ]);
        DB::commit();
        return response()->json($response, 201);

    }

    function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->id)->delete();
        return response()->json($user, 201);
    }


}
