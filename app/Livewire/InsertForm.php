<?php

namespace App\Livewire;
use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsertForm extends Component
{
    use WithFileUploads;
    
    #[Validate("required|string|max:255")]
    public $name;

    #[Validate("required|email|max:255|unique:students,email")]
    public $email;

    #[Validate("required|digits:10")]
    public $contact;

    #[Validate("nullable|image:jpeg,png,jpg,gif,svg|max:2048")]
    public $photo;

    public $search = '';

    public $isUpdate = false;

    public function save(){

    
        $data = $this->validate();
        
        // Handle file upload if photo is provided
        $this->photo && $data['photo'] = $this->photo->store('photos', 'public');
        
        Student::updateOrCreate(['id' => $this->isUpdate], $data);

        $this->reset(["name", "email", "contact"]);
        
        if($this->isUpdate){
            session()->flash("message", "Student updated successfully.");
            $this->isUpdate = false;
        }
        else{
            session()->flash("message", "Student created successfully.");
        }

    }

    public function delete($id){
        Student::find($id)->delete();
        session()->flash("message", "Student deleted successfully.");
    }


    public function updateForm($id){
        $student = Student::find($id);
        $this->name = $student->name;
        $this->email = $student->email;
        $this->contact = $student->contact;
        $this->isUpdate = $student->id;
        

    }
    public function render()
    {
        $students = Student::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('contact', 'like', '%'.$this->search.'%')
                    ->get();
        return view('livewire.insert-form', compact('students'));
    }
}
