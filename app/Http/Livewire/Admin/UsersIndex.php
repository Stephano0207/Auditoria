<?php

namespace App\Http\Livewire\Admin;
 
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class UsersIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme= "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    { 
        $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
    ->where('users.name', 'LIKE', '%'.$this->search.'%')
    ->orWhere('users.email', 'LIKE', '%'.$this->search.'%')
    ->select('users.id as id','users.name as name','users.email as email', 'roles.name as role_name',)
    ->orderBy('users.id', 'asc')
    ->paginate();

        return view('livewire.admin.users-index',compact('users'));
    }
}
