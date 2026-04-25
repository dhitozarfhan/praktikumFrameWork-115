<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            'nama' => 'Erindhito Nur Fauzan',
            'nim' => '20230140115',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Coding / Ngoding'
        ]);
    }
}
