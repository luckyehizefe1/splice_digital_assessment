<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;


class CommentService
{

    public function create(array $data): Comment
    {
        return Comment::create($data);
    }


    public function comments(int $perPage = 10): LengthAwarePaginator
    {
        return Comment::with('user')->paginate($perPage);
    }
}
