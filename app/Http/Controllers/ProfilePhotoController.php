<?php

namespace App\Http\Controllers;

class ProfilePhotoController extends Controller
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

    function createProfilePhoto(Request $request)
    {
        try {
            $data = $request->json()->all();
            $dataProfilePhoto = $data['ProfilePhoto'];
            $profilePhoto = ProfilePhoto::create([
                'type_archive' => $data ['type_archive'],
                'name_archive' => $data['name_archive'],
                'attached' => $data ['attached'],

            ]);
            return response()->json($profilePhoto, 201);
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

    function updateProfilePhoto(Request $request)
    {

            $data = $request->json()->all();
            $dataProfilePhoto = $data['ProfilePhoto'];
            DB::beginTransaction();
            $response = ProfilePhoto::findOrFail($data['id'])->update([
                'type_archive' => $data ['type_archive'],
                'name_archive' => $data['name_archive'],
                'attached' => $data ['attached'],

            ]);
            DB::commit();

            return response()->json($response, 201);

        }




    function deleteProfilePhoto(Request $request)
    {
      $user = ProfilePhoto::findOrFail($request->id)->delete();
        return response()->json($user,   201);
    }


}
