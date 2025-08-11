<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Actions\CreateFeedbackAction;
use App\Services\FeedbackService;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{

    public function __construct(
        protected FeedbackService $feedbackService,
        protected CreateFeedbackAction $createFeedbackAction
    ) {}



    public function create(FeedbackRequest $request): JsonResponse
    {
        $feedback = $this->createFeedbackAction->execute($request->validated(), auth()->id());

        return sendResponse(
            $feedback,
            201,
            'Feedback created successfully'
        );
    }

    public function feedbacks(): JsonResponse
    {
        $feedbacks = $this->feedbackService->feedbacks();
        return sendResponse(
            $feedbacks,
            200,
            'Feedbacks retrieved successfully'
        );
    }


    public function feedback(string $feedbackId): JsonResponse
    {
        $feedback = $this->feedbackService->find($feedbackId);
        return sendResponse(
            $feedback,
            200,
            'Feedback retrieved successfully'
        );
    }
}
