<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'blog_post_id' => 'required|exists:blog_posts,id',
            'parent_id' => 'nullable|exists:comments,id',
            'content' => 'required|string',
        ];
    }
}
