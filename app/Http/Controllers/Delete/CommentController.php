<?php
namespace App\Http\Controllers;
use App\Comment;
class CommentController extends Controller {
    public function index(){
        $comments = Comment::all();
        foreach ($comments as $comment) {
            print_r($comment->users->toArray());
            //print_r($comment->countries->toArray());
        }
    }
}
