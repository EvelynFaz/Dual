<?php

namespace App\Http\Controllers;

class PersonController extends Controller
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

    function createPerson(Request $request)
    {
        try {
            $data = $request->json()->all();
            $person = Person::create([
                'name' => $data['name'],
                'identification' => $data['identification'],
                'birthday' => $data['birthday'],
                'email' => $data['email_institutional'],
            ]);
            return response()->json($person, 201);
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

    function updatePerson(Request $request)
    {

        $data = $request->json()->all();
        DB::beginTransaction();

        $response = Person::findOrFail($data['id'])->update([
            'name' => $data['name'],
            'identification' => $data['identification'],
            'birthday' => $data['birthday'],
            'email_institutional' => $data['email_institutional'],

        ]);
        DB::commit();
        return response()->json($response, 201);

    }

    function deletePerson(Request $request)
    {
        $person = Person::findOrFail($request->id)->delete();
        return response()->json($person, 201);
    }


}
