<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use App\Http\Livewire\Admin\AdminComponent;

class ListUsers extends AdminComponent
{
    
    public $state=[];
    public  $updateStatus=false;
    public $user=null;
    public $userId=null;
    public function render()
    {

        $users=User::latest()->paginate(3);
        return view('livewire.admin.users.list-users',['users'=>$users]);
    }

    public function addNew(){
        $this->state=[];
        $this->updateStatus=false;
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser(){

         $validatedData = Validator::make($this->state,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
            ]
        )->validate();

        $validatedData['password']=bcrypt($validatedData['password']);

        User::create($validatedData);
        $this->state=[];
        session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form');

        return redirect()->back();

        // dd($validatedData);
    }


    public function edit(User $user){

        // dd($user);
        $this->state=$user->toArray();
        $this->user=$user;
        $this->updateStatus=true;
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser(){

            $validatedData = Validator::make($this->state,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->user->id,
                'password' => 'sometimes|confirmed',
                ]
            )->validate();

            if(!empty($validatedData['password'])){
                $validatedData['password']=bcrypt($validatedData['password']);
            }

            

            $this->user->update($validatedData);
            session()->flash('message', 'User Edited successfully!');

            $this->dispatchBrowserEvent('hide-form');
    }

    public function confirmation($userId){
        $this->userId=$userId;
        $this->dispatchBrowserEvent('confirmation-modal');

    }

    public function deleteUser(){
        $user=User::find($this->userId);
        $user->delete();
        session()->flash('message', 'User Deleted successfully!');
        $this->dispatchBrowserEvent('confirmation-modal');

    }

}
