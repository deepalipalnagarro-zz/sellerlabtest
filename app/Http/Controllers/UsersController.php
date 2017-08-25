<?php

namespace App\Http\Controllers;

use App\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->index();
    }

    /**
     * 
     * @param Request $request
     * @return type JSON
     */
    
    public function createUsers(Request $request) {
        $users = Users::create($request->all());
        return response()->json($users);
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type JSON
     */
    public function updateUsers(Request $request, $id) {
        $users = Users::find($id);
        $users->firstName = $request->input('firstName');
        $users->middleName = $request->input('middleName');
        $users->lastName = $request->input('lastName');
        $users->email = $request->input('email');
        $users->status = $request->input('status');
        $users->save();

        return response()->json($users);
    }

    /**
     * 
     * @param type $id
     * @return type JSON
     */
    public function deleteUsers($id) {
        $users = Users::find($id);
        $users->delete();

        return response()->json('Removed successfully.');
    }

    /**
     * 
     * @return type JSON
     */
    public function index() {
        $users = Users::all();
        //$queries = \DB::getQueryLog();
        //return dd($queries);
        return response()->json($users);
    }

}
