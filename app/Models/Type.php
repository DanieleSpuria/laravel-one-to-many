<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Type extends Model
{
    use HasFactory;

    public function projects() {
      return $this->hasMany(Project::class);
    }

    public static function generateSlug($str){
      $slug = Str::slug($str, '-');
      $original_slug = $slug;
      $slug_exixts = Type::where('slug', $slug)->first();
      $c = 1;
     while($slug_exixts){
          $slug = $original_slug . '-' . $c;
          $slug_exixts = Type::where('slug', $slug)->first();
          $c++;
      }
      return $slug;
    }
}
