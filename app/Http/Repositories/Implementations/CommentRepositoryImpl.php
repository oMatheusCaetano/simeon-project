<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\CommentRepository;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentRepositoryImpl implements CommentRepository
{

    public function create(array $data): object
    {
        $comment = Comment::create($data);
        DB::table('users_last_commented_post')->insert([
            'user_id' => $data['user_id'],
            'post_id' => $data['post_id'],
            'comment_id' => $comment->id,
        ]);
        return $comment;
    }
}
