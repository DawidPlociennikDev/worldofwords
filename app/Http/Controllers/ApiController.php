<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function getLotr()
    {
        return new Response(
            [
                'count' => '1', 
                'results' => 
                    [
                        'id' => 1,
                        'name' => 'Frodo Baggins',
                        'gender' => 'male'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Samwise Gamgee',
                        'gender' => 'male'
                    ],
            ]
        );
    }
}
