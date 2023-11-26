<?php

namespace App\Http\Module\Academy\Infrastructure\Repository;

use App\Http\Module\Academy\Domain\Model\Academy;
use App\Http\Module\Academy\Domain\Services\Repository\AcademyRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AcademyRepository implements AcademyRepositoryInterface
{
    public function save(Academy $academy)
    {
        $academy = DB::table('academies')->insert(
            [
              'title' => $academy->title,
              'description' => $academy->description,
              'price' => $academy->price,
              // replace space with dash from $academy->title and make it lowercase
              'slug' => strtolower(str_replace(' ', '-', $academy->title)),
              'duration' => $academy->duration,
              'level' => $academy->level,
              'instructor' => $academy->instructor,
              'category' => $academy->category,
              'additional_materials' => $academy->additional_materials,
              'certificate' => $academy->certificate,
              'consult' => $academy->consult,
              'youtubeLink' => $academy->youtubeLink,
              'image' => $academy->image,
              'memberCount' => 0,
            ]
        );

        return $academy;
    }
}
