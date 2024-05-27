<?php

namespace App\Http\Several;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{

    public function requestAjax () {
        return view ("ajax/view");
    }

    public function requestFetch () {
        return view ("fetch/view");
    }
}
