<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Person;
use Livewire\Attributes\Title;

class CreatePost extends Component
{

    public $name, $email, $bdate;

    public $uname, $ubdate;

    public $uid;

    public $search = '';

    public function save(){
        $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:people',
            'bdate' => 'required|date',
        ],
        [
            'bdate.required' => 'The birthdate field is required.'
        ]);

        Person::create([
            'name' => $this->name,
            'email' => $this->email,
            'bdate' => $this->bdate,
        ]);
    }

    public function delete($id){
        Person::find($id)->delete();
    }

    public function updateId($id)
    {
        $this->uid = $id;

        $editPerson = Person::find($id);

        if($editPerson){
            $this->uname = $editPerson->name;
            $this->ubdate = $editPerson->bdate;
        }else{
            return redirect()->to('/create-post');
        }
    }

    public function update(){

        $this->validate(
            [
                'uname' => 'required|min:6',
                'ubdate' => 'required|date',
            ],
            [
                'uname.required' => 'The name field is required',
                'uname.min' => 'The name field must be at least 6 characters.',
                'ubdate.required' => 'The birthdate field is required.'
            ]
        );
        Person::where('id', $this->uid)->update([
            'name' => $this->uname,
            'bdate' => $this->ubdate,
        ]);
    }

    #[Title('Create-post')] 
    public function render()
    {
        $persons = Person::where('name', 'like', '%' . $this->search . '%')->paginate(5);  
        return view('livewire.create-post')
            ->with(['persons' => $persons]);
    }
}
