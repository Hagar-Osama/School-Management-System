<?php

namespace App\Http\Livewire;

use App\Http\Requests\AddParentRequest;
use App\Models\Blood;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $catchError = false;
    public $successMessage = '';
    public $updateMode = false;
    public $currentStep = 1, $photos,
        $email, $password, $father_name, $father_name_en, $father_job, $father_job_en,
        $father_passport_id, $father_national_id, $father_phone, $father_nationality_id,
        $father_blood_id, $father_religion_id, $father_address,
        ///Mother Inputs
        $mother_name, $mother_name_en, $mother_job, $mother_job_en,
        $mother_passport_id, $mother_national_id, $mother_phone, $mother_nationality_id,
        $mother_blood_id, $mother_religion_id, $mother_address;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'father_national_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'father_passport_id' => 'min:10|max:10',
            'father_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_national_id' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'mother_passport_id' => 'min:10|max:10',
            'mother_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }
    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationality::get(),
            'bloodTypes' => Blood::get(),
            'Religions' => Religion::get()
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:parents,Email,' . $this->id,
            'password' => 'required',
            'father_name' => 'required',
            'father_name_en' => 'required',
            'father_job' => 'required',
            'father_job_en' => 'required',
            'father_national_id' => 'required|unique:parents,father_national_id,' . $this->id,
            'father_passport_id' => 'required|unique:parents,father_passport_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_nationality_id' => 'required',
            'father_blood_id' => 'required',
            'father_religion_id' => 'required',
            'father_address' => 'required',
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'mother_name' => 'required',
            'mother_name_en' => 'required',
            'mother_national_id' => 'required|unique:parents,mother_national_id,' . $this->id,
            'mother_passport_id' => 'required|unique:parents,mother_passport_id,' . $this->id,
            'mother_phone' => 'required',
            'mother_job' => 'required',
            'mother_job_en' => 'required',
            'mother_nationality_id' => 'required',
            'mother_blood_id' => 'required',
            'mother_religion_id' => 'required',
            'mother_address' => 'required',
        ]);
        $this->currentStep = 3;
    }

    public function submitForm()
    {
        try {
            $parents = new myParent();

            $parents->email = $this->email;
            $parents->password = Hash::make($this->password);

            $parents->father_name = ['ar' => $this->father_name, 'en' => $this->father_name_en];
            $parents->father_job = ['ar' => $this->father_job, 'en' => $this->father_job_en];
            $parents->father_national_id = $this->father_national_id;
            $parents->father_passport_id = $this->father_passport_id;
            $parents->father_address = $this->father_address;
            $parents->father_blood_id = $this->father_blood_id;
            $parents->father_religion_id = $this->father_religion_id;
            $parents->father_nationality_id = $this->father_nationality_id;
            $parents->father_phone = $this->father_phone;

            $parents->mother_name = ['ar' => $this->mother_name, 'en' => $this->mother_name_en];
            $parents->mother_job = ['ar' => $this->mother_job, 'en' => $this->mother_job_en];
            $parents->mother_national_id = $this->mother_national_id;
            $parents->mother_passport_id = $this->mother_passport_id;
            $parents->mother_address = $this->mother_address;
            $parents->mother_blood_id = $this->mother_blood_id;
            $parents->mother_religion_id = $this->mother_religion_id;
            $parents->mother_nationality_id = $this->mother_nationality_id;
            $parents->mother_phone = $this->mother_phone;

            $parents->save();

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->father_national_id, $photo->getClientOriginalName(), $disk ='parentsAttachments');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => myParent::latest()->first()->id
                    ]);
                }
            }
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        } catch (Exception $e) {
            $this->catchError = $e->getMessage();
        }
    }

    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->father_name = '';
        $this->father_name_en = '';
        $this->father_job = '';
        $this->father_job_en = '';
        $this->father_passport_id = '';
        $this->father_national_id = '';
        $this->father_phone = '';
        $this->father_nationality_id = '';
        $this->father_blood_id = '';
        $this->father_religion_id = '';
        $this->father_address = '';
        ///Mother Inputs
        $this->mother_name = '';
        $this->mother_name_en = '';
        $this->mother_job = '';
        $this->mother_job_en = '';
        $this->mother_passport_id = '';
        $this->mother_national_id = '';
        $this->mother_phone = '';
        $this->mother_nationality_id = '';
        $this->mother_blood_id = '';
        $this->mother_religion_id = '';
        $this->mother_address = '';
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }
}
