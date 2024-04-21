<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array

    {
        $id = $this->route('assignments')->id ?? null;
        $id = $this->route('assignments')->id ?? null;
        return [
            'student_id' => 'required|exists:students,id|unique:assignments,student_id,' . $id,
            'teacher_id' => 'required|exists:teachers,id|unique:assignments,teacher_id,' . $id,
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}
