<?php

namespace ChurakovMike\LaravelRpcServer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JsonRpcRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function getId(): ?int
    {
        return $this->input('id');
    }
}
