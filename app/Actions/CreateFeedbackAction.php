<?php

namespace App\Actions;

use App\Services\FeedbackService;

class CreateFeedbackAction
{

    public function __construct(protected FeedbackService $feedbackService) {}

    public function execute(array $data): array
    {
        $user = auth()->user();
        if (!$user) {
            return [
                'message' => 'Unauthorized',
            ];
        }

        $feedback = $this->feedbackService->create($data, $user->id);

        return [
            'message'   => 'Feedback created successfully',
            'feedback'  => $feedback,
        ];
    }
}