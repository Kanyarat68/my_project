<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plants extends Model
{
    use HasFactory;

    protected $fillable = ["id",
        "kind",
        "sci_name",
        "name",
        "family",
        "genus",
        "trunk",
        "leaf",
        "bloom",
        "fruit",
        "seed",
        "property",
        "type",
        "qrcode",
        "picture",
        "cropping",
        "container",
        "care",
        "belief",
        "clime",
        "created_at",
        "updated_at"];
}
