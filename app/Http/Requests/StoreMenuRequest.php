<?php

namespace App\Http\Requests;

use App\Menu;
use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('menu_create');
    }

    public function rules()
    {
        return [];
    }
}
