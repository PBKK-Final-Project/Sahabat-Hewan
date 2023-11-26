<?php

namespace App\Http\Module\Academy\Presentation\Controller;

use App\Http\Module\Academy\Application\Services\CreateAcademy\CreateAcademyRequest;
use App\Http\Module\Academy\Application\Services\CreateAcademy\CreateAcademyService;
use Illuminate\Http\Request;

class AcademyController
{
    public function __construct(
        private CreateAcademyService $create_academy_service
    )
    {
    }

    public function createAcademy(Request $request){
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

      $memberCount = 0;

      $request = new CreateAcademyRequest(
          $request->input('title'),
          $request->input('description'),
          $request->input('price'),
          $filename,
          $memberCount,
          $request->input('duration'),
          $request->input('level'),
          $request->input('instructor'),
          $request->input('category'),
          $request->input('additional_materials'),
          $request->input('certificate'),
          $request->input('consult'),
          $request->input('youtubeLink'),
          strtolower(str_replace(' ', '-', $request->input('title')))
      );

      $data = $this->create_academy_service->execute($request);

      if(!$data)
      {
          return response()->json([
              'status' => 'error',
              'message' => 'Academy failed to create'
          ], 400);
      }
      return redirect('/academy');

    }
}
