<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Academy;

class AcademyController extends Controller
{
    public function index()
    {
        $academies = Academy::all();
        return view('academy.academy', ['academies' => $academies]);
    }
    public function singleAcademy(Academy $article)
    {
        return view('academy.singleacademy', ['academy' => $article]);
    }

    public function create()
    {
        return view('admin.create-academy');
    }

    public function edit($id)
    {
        $academies = Academy::find($id);
        // dd($product);
        return view('admin.edit-academy', ['academy' => $academies]);
    }

    public function adminAcademy()
    {
        $academies = Academy::all();
        // dd($data);
        return view('admin.admin-academy', ['academies' => $academies]);
    }

    public function storeAcademy(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'level' => 'required',
            'instructor' => 'required',
            'category' => 'required',
            'additional_materials' => 'required',
            'certificate' => 'required',
            'consult' => 'required',
            'youtubeLink' => 'required',
        ]);

        $filename = '';
        if ($request->file('image'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

            $filename = 'academy-' . time() . '_' . rand(0, 9999) . '.' . $request->file('image')->extension();

            $request->file('image')->storeAs('/public/academy/images', $filename);
        }

        $academy = Academy::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            // replace space with dash from $request->title and make it lowercase
            'slug' => strtolower(str_replace(' ', '-', $request->title)),
            'duration' => $request->duration,
            'level' => $request->level,
            'instructor' => $request->instructor,
            'category' => $request->category,
            'additional_materials' => $request->additional_materials,
            'certificate' => $request->certificate,
            'consult' => $request->consult,
            'youtubeLink' => $request->youtubeLink,
            'image' => $filename,
            'memberCount' => 0,
        ]);

        return redirect('/academy');
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'duration' => 'required',
                'level' => 'required',
                'instructor' => 'required',
                'category' => 'required',
                'additional_materials' => 'required',
                'certificate' => 'required',
                'consult' => 'required',
                'youtubeLink' => 'required',
            ]
        );

        $filename = '';
        if($request->file('image'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $filename = 'product' . time() . '_' . rand(0, 999) . '.' . $request->file('image')->extension();

            $request->file('image')->storeAs('/public/product/images', $filename);

        }

        $academy = Product::find($request->id);
        $academy->title = $request->title;
        $academy->instructor = $request->instructor;
        $academy->level =  $request->level;
        $academy->category = $request->category;
        $academy->certificate = $request->certificate;
        $academy->consult = $request->consult;
        $academy->description = $request->description;
        $academy->additional_materials = $request->additional_materials;
        $academy->price = $request->price;
        $academy->duration = $request->duration;
        $academy->youtubeLink = $request->youtubeLink;

        // if($filename != '')
        // {
        //     $oldImage = $product->image;
        //     if($oldImage != '')
        //     {
        //         unlink(storage_path('\app\public\product\images\\' . $oldImage));
        //     }
        //     $product->image = $filename;
        // }
        $product->save();

        return redirect('/admin-academy');
    }
}