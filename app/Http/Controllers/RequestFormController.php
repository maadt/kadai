<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestFormController extends Controller
{
    public function form()
    {
        return view("requestForm.form");
    }

    public function postRequest(Request $request)
    {
        echo $request->get("message");
    }

    public function getRequest(Request $request)
    {
        echo $request->get("message");
    }

    public function showAllRequest(Request $request)
    {
        $requestData = $request->all("message", "color");
        foreach($requestData as $data) {
            echo $data;
        }
    }
}