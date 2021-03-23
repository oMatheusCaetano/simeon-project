<?php

namespace App\Http\Repositories\Implementations;

use App\Http\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepositoryImpl implements PostRepository
{
    public function getAllPaginated(): array
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5)->toArray();
        foreach ($posts['data'] as $key => $value) {
            $posts['data'][$key]['comments'] = DB::table('comments')
                ->select(['comments.description', 'comments.created_at', 'users.name', 'users.email'])
                ->where('post_id', '=', $value['id'])
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->orderBy('comments.created_at', 'desc')
                ->get();
        }
        return $posts;
    }

    public function findLastCommented(int $userId): ?object
    {
        $data = DB::table('users_last_commented_post')
            ->select([
                'comments.description as comment',
                'comments.created_at',
                'posts.title',
                'posts.id',
                'posts.description',
                'users.name',
                'users.email',
            ])
            ->where('users_last_commented_post.user_id', '=', $userId)
            ->join('users', 'users.id', '=', 'users_last_commented_post.user_id')
            ->join('posts', 'posts.id', '=', 'users_last_commented_post.post_id')
            ->join('comments', 'comments.id', '=', 'users_last_commented_post.comment_id')
            ->orderBy('comments.created_at', 'desc')
            ->limit(1)
            ->get();

        return count($data) == 0 ? null : $data[0];
    }

    public function create(array $data): object
    {
        return Post::create($data);
    }
}
