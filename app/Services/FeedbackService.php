<?php

namespace App\Services;

use App\Models\Feedback;
use Illuminate\Pagination\LengthAwarePaginator;

class FeedbackService
{


    public function create(array $data, string $userId): Feedback
    {
        return Feedback::create(
            [
                'title'       => $data['title'],
                'description' => $data['description'],
                'category'    => $data['category'],
                'user_id'     => $userId,
            ]
        );
    }



    public function find(string $feedbackId): ?Feedback
    {
        return Feedback::with('user', 'comments.user')->findOrFail($feedbackId);
    }


    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Feedback::with('user')->paginate($perPage);
    }
}