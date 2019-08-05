<?php

namespace App\Http\Requests\MyWork;

use App\Http\Requests\ValidationErrorResponseCustomizer;
use App\Models\Work;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    use ValidationErrorResponseCustomizer;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $work = $this->route('work');
//        $uid = auth()->user()->id;
//        if ($work->owner_id == $uid) {
//            return true;
//        }
//        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'max:256',
            'reward' => 'integer',
            'description' => 'max:256',
            'entry_end_at' => 'date',
        ];
    }
}
