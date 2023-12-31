<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;
    protected $table = 'academies'; // Nama tabel di database
    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'slug',
        'memberCount',
        'duration',
        'level',
        'instructor',
        'category',
        'additional_materials',
        'certificate',
        'consult',
        'youtubeLink',
    ];}
