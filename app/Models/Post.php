<?php

namespace App\Models;

use App\Http\Controllers\CustomerController;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = ['user_id', 'text', 'image', 'post_date'];

    // Relationship with the Customer (assuming a customer has many posts)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // Relationship with Comments (assuming a post has many comments)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    } 

}
