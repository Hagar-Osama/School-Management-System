<?php

namespace App\Http\Livewire;

use App\Http\Requests\AddParentRequest;
use App\Http\Traits\FilesTraits;
use App\Models\Blood;
use App\Models\myParent;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;
    use FilesTraits;

    public $catchError = false;
    public $successMessage = '';
    public $updateMode = false;
    public $currentStep = 1, $photos = [], $showParentTable = true, $parent_id,
        $email, $password, $father_name, $father_name_en, $father_job, $father_job_en,
        $father_passport_id, $father_national_id, $father_phone, $father_nationality_id,
        $father_blood_id, $father_religion_id, $father_address, $file_name,
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
            'Religions' => Religion::get(),
            'parents' => myParent::get()
        ]);
    }

    public function showAddForm()
    {
        $this->showParentTable = false;
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
                    $photo->storeAs('parent_attachments/' . $this->father_phone, $photo->getClientOriginalName(), $disk = 'public');
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'parent_id' => myParent::latest()->first()->id,
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
    //in this function when we clicked on edit button we activated the updatemode and hide the table
    public function edit($parentId)
    {
        $this->showParentTable = false;
        $this->updateMode = true;
        $parent = myParent::where('id', $parentId)->first();
        $this->parent_id = $parentId;
        $this->email = $parent->email;
        $this->password = $parent->password;
        $this->father_name = $parent->getTranslation('father_name', 'ar');
        $this->father_name_en = $parent->getTranslation('father_name', 'en');
        $this->father_job = $parent->getTranslation('father_job', 'ar');
        $this->father_job_en = $parent->getTranslation('father_job', 'en');
        $this->father_passport_id = $parent->father_passport_id;
        $this->father_national_id = $parent->father_national_id;
        $this->father_phone = $parent->father_phone;
        $this->father_nationality_id = $parent->father_nationality_id;
        $this->father_blood_id = $parent->father_blood_id;
        $this->father_religion_id = $parent->father_religion_id;
        $this->father_address = $parent->father_address;
        ///Mother Inputs
        $this->mother_name = $parent->getTranslation('mother_name', 'ar');
        $this->mother_name_en = $parent->getTranslation('mother_name', 'en');
        $this->mother_job = $parent->getTranslation('mother_job', 'ar');
        $this->mother_job_en = $parent->getTranslation('mother_job', 'en');
        $this->mother_passport_id = $parent->mother_passport_id;
        $this->mother_national_id = $parent->mother_national_id;
        $this->mother_phone = $parent->mother_phone;
        $this->mother_nationality_id = $parent->mother_nationality_id;
        $this->mother_blood_id = $parent->mother_blood_id;
        $this->mother_religion_id = $parent->mother_religion_id;
        $this->mother_address = $parent->mother_address;
    }
    //this method is activated when we click next to go to mother form (step 1)
    public function firstStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }
    ///this method is activated when we click next to go to attachments and confirmation (step 2)
    public function secondStepSubmitEdit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }
    //this method is activated when we want to click confirm (step 3)
    public function submitFormEdit()
    {
        if ($this->parent_id) {
            $parent = myParent::find($this->parent_id);
            $parent->update([
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'father_name' => ['ar' => $this->father_name,  'en' => $this->father_name_en],
                'father_job' => ['ar' => $this->father_job, 'en' => $this->father_job_en],
                'father_passport_id' => $this->father_passport_id,
                'father_national_id' => $this->father_national_id,
                'father_phone' => $this->father_phone,
                'father_nationality_id' => $this->father_nationality_id,
                'father_blood_id' =>  $this->father_blood_id,
                'father_religion_id' => $this->father_religion_id,
                'father_address' =>  $this->father_address,
                ///Mother Inputs
                'mother_name' => ['ar' => $this->mother_name,  'en' => $this->mother_name_en],
                'mother_job' => ['ar' => $this->mother_job,  'en' => $this->mother_job_en],
                'mother_passport_id' => $this->mother_passport_id,
                'mother_national_id' =>  $this->mother_national_id,
                'mother_phone' => $this->mother_phone,
                'mother_nationality_id' =>  $this->mother_nationality_id,
                'mother_blood_id' => $this->mother_blood_id,
                'mother_religion_id' =>  $this->mother_religion_id,
                'mother_address' => $this->mother_address,
            ]);
        }
        return redirect()->to('add-parent')->with('success', 'data updated successfully');
    }

    public function delete($parentId)
    {
        $parentAttachments = ParentAttachment::where('parent_id', $parentId)->first();
        if ($parentAttachments->count() != 0) {
            // $parentAttachments->delete();
                $path = 'storage/parent_attachments/' . $parentAttachments->father_phone. $parentAttachments->file_name;
                $this->deleteFile($path);


            // dd($path);
            $parent = myParent::find($parentId);
            // $parent->delete();
            return redirect()->to('add-parent')->with('success', 'Data Deleted Successfully');
        } else {

            // $parent = myParent::find($parentId);
            // $parent->delete();
            return redirect()->to('add-parent')->with('success', 'Data Deleted Successfully');
        }
    }
}
