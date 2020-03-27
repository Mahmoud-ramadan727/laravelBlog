<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;

class UpdatePostRequest extends FormRequest
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
    public function rules()
    {
        $post=Post::find($this->post);
         
        return [
            'title' => [
                'required','min:3','alpha',
                Rule::unique('posts')->ignore($post->id),
             ],
            'description'=>'required|alpha|min:10'
        ];
    }
}
