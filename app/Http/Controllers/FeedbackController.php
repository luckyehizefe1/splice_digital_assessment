<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
