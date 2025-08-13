<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CommentRequest;
use App\Actions\StoreCommentAction;
use App\Services\CommentService;

class CommentController extends Controller
{

    public function __construct(
        protected StoreCommentAction $storeCommentAction,
        protected CommentService $commentService
    ) {}


    public function create(CommentRequest $request, string $feedbackId): JsonResponse
    {

        if (empty($feedbackId)) {
            return sendResponse(
                null,
                400,
                'Feedback ID is required.'
            );
        }


        $comment = $this->storeCommentAction->execute(
            $request->validated(),
            auth()->id(),
            $feedbackId
        );
        return sendResponse(
            $comment,
            201,
            'Comment created successfully.'
        );
    }


    public function comments(string $feedbackId): JsonResponse
    {
        $comments = $this->commentService->comments($feedbackId);
        return sendResponse(
            $comments,
            200,
            'Comments retrieved successfully.'
        );
    }
}
