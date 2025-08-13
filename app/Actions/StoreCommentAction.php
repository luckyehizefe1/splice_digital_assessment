<?php

namespace App\Actions;

use App\Services\CommentService;
use App\Models\Comment;

class StoreCommentAction
{


    public function __construct(protected CommentService $commentService) {}



    public function execute(array $data, string $userId, string $feedbackId): Comment
    {
        $data['user_id']     = $userId;
        $data['feedback_id'] = $feedbackId;
        return $this->commentService->create($data);
    }
}
