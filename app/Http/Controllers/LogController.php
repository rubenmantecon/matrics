<?php

namespace App\Http\Controllers;

use DB;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if ($user['token'])
                $data = DB::table('logs')->join('users', 'logs.user_id', '=', 'users.id')->select('logs.*', 'users.name')->orderBy('logs.updated_at', 'desc')->get();
        }
        return response()->json($data);
    }
}
