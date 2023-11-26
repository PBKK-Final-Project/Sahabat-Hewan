<?php

namespace App\Http\Module\Academy\Domain\Model;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Academy
{
  // "judul", "deskripsi", "rating", "harga", "bidangId"

    /**
     * @param string $judul
     * @param string $deskripsi
     * @param int $rating
     * @param float $harga
     * @param int $bidangId
     */
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
