<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
       switch ($this->method()) {
            case 'PUT':
            case 'POST': {
                    $id = (int) $this->input('id', 0);
                    $unique_id = ($id > 0) ? ',' . $id : '';
                    return [
                        "fullname" => "required",
                        "description" => "required",
                        'email' => 'required|email',
                        "mobile" => "required|regex:/^07\d{0,9}$/|min:10|max:10",
                        "speciality" => "required",
                        "appointment_date" => "required",

                    ];
                }
            default:break;
        }
    }
 public function messages()
    {
        return [
            'fullname.required' => 'Please Enter Fullname',
            'description.required' => 'Please Enter Notes',
            'speciality.required' => 'Please choose Speciality.',
            'email.required' => 'Please  Enter Email.',
            'mobile.required' => 'Please Enter Mobile Number.',
            'appointment_date.required' => 'Please choose Appointment Date.',


        ];
    }

}
