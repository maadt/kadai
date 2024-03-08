<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function inputMessage(Request $request)
    {
        $message = "";
        if ($request->session()->has("message"))
        {
            $message = $request->session()->get("message");
        }
            
        return view("session.form", [
            "message" => $message
        ]);
    }

    public function setSession(Request $request)
    {
        $request->session()->put("message", $request->get("message"));
        //put(キー, セッションに保存する値)
        return redirect("session/inputMessage");
    }
}