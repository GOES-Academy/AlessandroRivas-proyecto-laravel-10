<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  private $userNames = ['Ángel', 'Noé', 'Elsy', 'Luis', 'Gerardo', 'Alejandro', 'Douglas'];

  public function listUserNames()
  {
    return $this->userNames;
  }

  public function getUserName($userName)
  {
    if(!in_array($userName, $this->userNames)) {
      return 'Hi ' . $userName . " you're not register!";
    }

    return 'Hi, ur welcome ' . $userName . '!';
  }

  public function callUserName(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'userName' => 'required|string',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 401);
    }

    return response()->json('Hi ' . $request->userName, 200);
  }
}
