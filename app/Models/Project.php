<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'slug',
      'date',
      'image_name',
      'image_path',
      'description'
    ];

    public static function generateSlug($str){
      $slug = Str::slug($str, '-');
      $original_slug = $slug;
      $slug_exixts = Project::where('slug', $slug)->first();
      $c = 1;
     while($slug_exixts){
          $slug = $original_slug . '-' . $c;
          $slug_exixts = Project::where('slug', $slug)->first();
          $c++;
      }
      return $slug;
    }
}
