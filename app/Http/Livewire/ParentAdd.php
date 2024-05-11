<?php

namespace App\Http\Livewire;


use App\Models\MyParent;
use App\Models\Nationalities;
use App\Models\ParentAttachment;
use App\Models\Religions;
use App\Models\TypeBloods;
use Exception;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ParentAdd extends Component

{
    use WithFileUploads;
    public $currentStep = 1,
        // قائمة اولياء الامور
        $show_table = true, $updateMode = false, $photos = [],

        $email, $password, $parent_id,
        // معلومات الاب
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,

        // معلومات الام
        $Name_Mother, $Name_Mother_en, $Job_Mother, $Job_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother, $Phone_Mother,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Religion_Mother_id, $Address_Mother;

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationalities::all(),
            'Type_Bloods' => TypeBloods::all(),
            'Religions' => Religions::all(),
            'my_parents' => MyParent::all(),
        ]);
    }
    public function AddParents()
    {
        $this->show_table = false;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:MyParents,email,' . $this->id,
            'password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:MyParents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:MyParents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);

        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {

        $this->validate([
            'email' => 'required|unique:MyParents,email,' . $this->id,
            'password' => 'required',
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:MyParents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:MyParents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function submitForm()
    {
        $My_Parent = new MyParent();
        $My_Parent->email = $this->email;
        $My_Parent->password = Hash::make($this->password);

        $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
        $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
        $My_Parent->National_ID_Father = $this->National_ID_Father;
        $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
        $My_Parent->Phone_Father = $this->Phone_Father;
        $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
        $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
        $My_Parent->Religion_Father_id = $this->Religion_Father_id;
        $My_Parent->Address_Father = $this->Address_Father;

        $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
        $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
        $My_Parent->National_ID_Mother = $this->National_ID_Mother;
        $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
        $My_Parent->Phone_Mother = $this->Phone_Mother;
        $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
        $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
        $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
        $My_Parent->Address_Mother = $this->Address_Mother;


        $My_Parent->save();
        toastr(trans('message.success'));
        $this->clearForm();
        $this->currentStep = 1;
        $this->show_table = true;
        return redirect()->to('/add_parent');
    }

    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father = '';
        $this->Religion_Father_id = '';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother = '';
        $this->Religion_Mother_id = '';
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $this->show_table = false;
        $Parents = MyParent::where('id', $id)->first();
        $this->parent_id = $id;
        $this->email =  $Parents->email;
        $this->password =  $Parents->password;
        $this->Name_Father =  $Parents->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en =  $Parents->getTranslation('Name_Father', 'en');
        $this->Job_Father =  $Parents->getTranslation('Job_Father', 'ar');
        $this->Job_Father_en =  $Parents->getTranslation('Job_Father', 'en');
        $this->National_ID_Father = $Parents->National_ID_Father;
        $this->Passport_ID_Father =  $Parents->Passport_ID_Father;
        $this->Phone_Father =  $Parents->Phone_Father;
        $this->Nationality_Father_id =  $Parents->Nationality_Father_id;
        $this->Blood_Type_Father_id =  $Parents->Blood_Type_Father_id;
        $this->Address_Father = $Parents->Address_Father;
        $this->Religion_Father_id = $Parents->Religion_Father_id;

        $this->Name_Mother =  $Parents->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en =  $Parents->getTranslation('Name_Mother', 'en');
        $this->Job_Mother =  $Parents->getTranslation('Job_Mother', 'ar');
        $this->Job_Mother_en =  $Parents->getTranslation('Job_Mother', 'en');
        $this->National_ID_Mother = $Parents->National_ID_Mother;
        $this->Passport_ID_Mother =  $Parents->Passport_ID_Mother;
        $this->Phone_Mother =  $Parents->Phone_Mother;
        $this->Nationality_Mother_id =  $Parents->Nationality_Mother_id;
        $this->Blood_Type_Mother_id =  $Parents->Blood_Type_Mother_id;
        $this->Address_Mother = $Parents->Address_Mother;
        $this->Religion_Mother_id = $Parents->Religion_Mother_id;
    }

    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->show_table = false;
        $this->currentStep = 2;
    }
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->show_table = false;
        $this->currentStep = 3;
    }
    public function submitForm_Edit()
    {
        $parents = MyParent::findOrFail($this->parent_id);

        $parents->email = $this->email;
        $parents->password = Hash::make($this->password);

        // معلومات الاب
        $parents->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
        $parents->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
        $parents->National_ID_Father = $this->National_ID_Father;
        $parents->Passport_ID_Father = $this->Passport_ID_Father;
        $parents->Phone_Father = $this->Phone_Father;
        $parents->Nationality_Father_id = $this->Nationality_Father_id;
        $parents->Blood_Type_Father_id = $this->Blood_Type_Father_id;
        $parents->Religion_Father_id = $this->Religion_Father_id;
        $parents->Address_Father = $this->Address_Father;

        // معلومات الام
        $parents->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
        $parents->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
        $parents->National_ID_Mother = $this->National_ID_Mother;
        $parents->Passport_ID_Mother = $this->Passport_ID_Mother;
        $parents->Phone_Mother = $this->Phone_Mother;
        $parents->Nationality_Mother_id = $this->Nationality_Mother_id;
        $parents->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
        $parents->Religion_Mother_id = $this->Religion_Mother_id;
        $parents->Address_Mother = $this->Address_Mother;


        $parents->update();
        toastr(trans('message.success'));
        $this->clearForm();
        $this->currentStep = 1;
        $this->show_table = true;
        return redirect()->to('/add_parent');
    }

    public function delete($id)
    {
        MyParent::findOrFail($id)->delete();
        return redirect()->to('/add_parent');
    }
    public function back($num)
    {
        $this->currentStep = $num;
    }
}
