<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Comment;
use App\Vote;
use App\User;


class Article extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function comment ()
    {
        return $this->hasMany(Comment::class);
    }

    public function vote () 
    {
        return $this->hasMany(Vote::class);
    }
    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}