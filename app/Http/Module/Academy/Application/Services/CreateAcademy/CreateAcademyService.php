<?php

namespace App\Http\Module\Academy\Application\Services\CreateAcademy;

use App\Http\Module\Academy\Application\Services\CreateAcademy\CreateAcademyRequest;
use App\Http\Module\Academy\Domain\Model\Academy;
use App\Http\Module\Academy\Domain\Services\Repository\AcademyRepositoryInterface;
use App\Http\Module\Academy\Infrastructure\Repository\AcademyRepository;

class CreateAcademyService
{

    public function __construct(
        // private AcademyRepositoryInterface $academy_repository
        private AcademyRepository $academy_repository
    )
    {
    }

  // "judul", "deskripsi", "rating", "harga", "bidangId"
    
    public function execute(CreateAcademyRequest $request){
        $academy = new Academy(
            $request->title,
            $request->description,
            $request->price,
            $request->image,
            $request->memberCount,
            $request->duration,
            $request->level,
            $request->instructor,
            $request->category,
            $request->additional_materials,
            $request->certificate,
            $request->consult,
            $request->youtubeLink,
            $request->slug,
        );

        return $this->academy_repository->save($academy);
    }
}
