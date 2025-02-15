<?php

namespace App\Policies;

use App\Models\Admin;

use App\Models\Moderator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;


class QuestionPolicy {
    /**
     * Create a new policy instance.
     */
    public function __construct() {
        //
    }

    /**
     * Determine if all questions can be listed by a user.
     */
    public function list(User $user): bool {
        // Any (authenticated) user can list its own questions.
        return Auth::check();
    }

    /**
     * Determine if a question can be created by a user.
     */
    public function create(): bool {
        // Any user can create a new question.
        return Auth::check();
    }

    /**
     * Determine if a question can be deleted by a user.
     */
    public function delete(User $user, Question $question): bool {
        return $user->user_id === $question->id_user|| Admin::where('admin_id', $user->user_id)->exists() || Moderator::where('mod_id', $user->user_id)->exists();
    }

    public function edit(User $user, Question $question): bool
    {
        return $user->user_id === $question->id_user || Admin::where('admin_id', $user->user_id)->exists() || Moderator::where('mod_id', $user->user_id)->exists();
    }

    public function markBestAnswer(User $user, Question $question): bool
    {
        return $user->user_id === $question->id_user;
    }

    public function deleteBestAnswer(User $user, Question $question): bool
    {
        return $user->user_id === $question->id_user;
    }
}