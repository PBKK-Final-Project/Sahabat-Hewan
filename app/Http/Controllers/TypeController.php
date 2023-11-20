<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getType()
    {
        $types = Type::all();

        return view('admin.create-type', ['types' => $types]);
    }

    public function updateType(Request $request, $id)
    {

        $id = (int) $id;
        $type = Type::findOrfail($id);
        
        $type->type = $request->type;
        $type->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Type',
            'code' => 200,
            'data' => $type
        ], 200);
    }

    public function storeType(Request $request)
    {
        $type = Type::create([
            'type' => $request->type
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Type',
            'code' => 200,
            'data' => $type
        ], 200);
    }

    public function deleteType($id)
    {
        $id = (int) $id;
        $type = Type::findOrfail($id);
        $type->delete();

        return response()->json([
            'success' => true,
            'message' => 'Type',
            'code' => 200,
            'data' => $type
        ], 200);
    }
}
