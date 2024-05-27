<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudController extends Controller
{

    
    public function create (Request $request) {
        $data = $request->all();
        return response()->json($data);
    }
    
    public function getbyid (Request $request) {
        $data = [
            [
                'id' => 1,
                'name' => 'Lucas',
                'age' => 25,
                'email' => 'lucas@example.com'
            ],
            [
                'id' => 2,
                'name' => 'Lancho',
                'age' => 30,
                'email' => 'lancho@example.com'
            ],
            [
                'id' => 3,
                'name' => 'Darcy',
                'age' => 22,
                'email' => 'darcy@example.com'
            ],
        ];

        $id = $request->input('id');

        $filteredData = array_filter($data, function($item) use ($id) {
            return $item['id'] == $id;
        });

        $filteredData = array_values($filteredData);

        return response()->json($filteredData);
    }

    public function getall () {

        $data = [
          'id' => 1,
          'name' => 'Lucas',
          'age' => 25,
          'email' => 'lucas@example.com'
        ];
        return response()->json($data);
    }

    public function update (Request $request) {
        $data = $request->all();
        return response()->json($data);
    }

    public function delete ($id) {
        $data = "";
        if ($id == 1 || $id == 2 || $id == 3 ) {
            $data = [
                'type' => "success",
            ];
        } else {
            $data = [
                'type' => "error",
            ];
        }

        return response()->json($data);
    }
}
