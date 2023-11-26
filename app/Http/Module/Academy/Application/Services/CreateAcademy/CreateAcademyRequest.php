<?php

namespace App\Http\Module\Academy\Application\Services\CreateAcademy;

class CreateAcademyRequest
{
  // "judul", "deskripsi", "rating", "harga", "bidangId"
  
    public function __construct(
        public string $title,
        public string $description,
        public float $price,
        public string $image,
        public string $memberCount,
        public string $duration,
        public string $level,
        public string $instructor,
        public string $category,
        public string $additional_materials,
        public string $certificate,
        public string $consult,
        public string $youtubeLink,
        public string $slug,
    )
    {
    }
}
