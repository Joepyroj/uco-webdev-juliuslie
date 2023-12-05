<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class HomeController extends Controller
{
    function index(Request $request)
    {
        return view('home.index', [
            'nama' => 'Julius',
            'tanggal' => '<div style="color:red">'.date('Y-m-d').'</div>'
        ]);
    }
}
