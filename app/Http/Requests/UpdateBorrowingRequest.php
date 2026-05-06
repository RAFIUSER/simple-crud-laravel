<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBorrowingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
            'status' => 'required|in:borrowed,returned',
        ];
    }
}
