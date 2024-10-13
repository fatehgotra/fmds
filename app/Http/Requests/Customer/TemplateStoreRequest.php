<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class TemplateStoreRequest extends FormRequest
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
        return [
            'name'     => 'required|string|max:512|unique:templates',
            'slug'     => 'required|string',
            'category' => 'required|string|in:Utility,Marketing',
            'header_type'       => 'required|string|in:none,text,image,video,audio,pdf',
            'body'              => 'required|string|max:1024',
            'footer'            => 'nullable|string|max:60',
            'language'            => 'required|string',
            'header'            =>  (request()->header_type == 'text') ? 'required|string|max:60' : '',
            'visit_website_url_1'  => (!empty(request()->visit_website_name_1)) ? 'required|max:60' : '',
            'call_phone_dial_code'  => (!empty(request()->call_phone_name)) ? 'required|min:1' : '',
            'call_phone_number'  => (!empty(request()->call_phone_name)) ? 'required|min:1' : '',
            'image'             => 'required_if:header_type,image|image|mimes:jpeg,png,gif|max:5120',
            'video'             => 'required_if:header_type,video|mimes:mp4,avi,mov,wmv|file|max:16384',
            'pdf'               => 'required_if:header_type,pdf|file|mimes:pdf|max:5120',
            "buttons"    => (request()->buttons && count(request()->buttons) > 0) ? "required|array|min:0" : '',
            "buttons.*"  => (request()->buttons && count(request()->buttons) > 0) ? "required|string|distinct|min:0|max:25" : '',
           /* 'button_type'       => 'required|string|in:NONE,QUICK_REPLY,CTA',
            'type_of_action'    => 'required_if:,CTA|array',
            'button_value'      => 'required_if:button_type,CTA|array',
            'buttons.*'     => [ 'required_if:button_type,QUICK_REPLY', 'string', 'max:255' ]*/
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Template name is required.',
            'name.max' => 'Template name can have a maximum of 512 characters.',
            'category.required' => 'Template category is required.',
            'category.in' => 'Template category must be one of UTILITY, MARKETING.',
            'header_type.required' => 'Header type is required.',
            'header_type.in' => 'Header type must be one of none, text, image, video, audio, or document.',
            'message_body.required' => 'Message body is required.',
            'message_body.max' => 'Message body can have a maximum of 1024 characters.',
            'footer_text.max' => 'Footer text can have a maximum of 60 characters.',
            'language.required' => 'language is required.',
            'header.required_if' => 'Header text is required when the header type is "text".',
            'header.max' => 'Header text can have a maximum of 60 characters.',
            'image.required_if' => 'Header image is required when the header type is "image".',
            'image.mimes' => 'Header image must be a JPEG, PNG, or GIF.',
            'image.max' => 'Header image size must not exceed 5120 KB.',
            'video.mimes' => 'Header video must be one of MP4, AVI, MOV, or WMV.',
            'video.max' => 'Header video size must not exceed 16384 KB.',
            'pdf.required_if' => 'Header pdf is required when the header type is "pdf".',
            'pdf.mimes' => 'Header pdf must be a PDF.',
            'pdf.max' => 'Header pdf size must not exceed 5120 KB.',
        ];
    }
}
