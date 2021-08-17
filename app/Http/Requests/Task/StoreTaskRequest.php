<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            "name" => "required|max:25",
            "author" => "required|max:25",
            "status" => "required"
        ];
    }

    /**
     * Get all of the validation messages.
     *
     * @return string[]
     */
    public function messages():array
    {
        return [
            "name.required" => "Просим запонить поле имя",
            "name.max" => "Количество символов у поля имя не должно превышать 25",
            "author.required" => "Просим запонить поле автор",
            "author.max" => "Количество символов у поля автор не должно превышать 25",
            "status.required" => "Просим выберить статус для задачи",
        ];
    }
}
