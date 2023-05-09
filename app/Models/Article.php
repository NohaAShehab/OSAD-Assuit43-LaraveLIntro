<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'no_of_pages', 'image', 'description', 'user_id'];

    # model --> where we define the table relation
    # eloquent ORM relationship
    ## this article may related to only one user
    function  user(){
        return $this->belongsTo(User::class);
    }
}
