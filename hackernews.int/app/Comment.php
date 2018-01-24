<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;
use App\User;


class Comment extends Model
{
    use SoftDeletes;
    public $table       = "article_comments";
    public $primaryKey  = "id";
    protected $dates    = ['deleted_at'];

    public function article ()
    {
        return $this->belongsTo(Article::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}