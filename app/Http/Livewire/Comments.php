<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Comment;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $newComments;
    public $image;

    protected $listners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        dd($imageData);
    }

    public function addComment()
    {
        $this->validate(['newComments' => 'required | max:255']);
        $createdComment = Comment::create(['body' => $this->newComments, 'user_id' => 4, 'support_ticket_id' => 4]);
        $this->newComments = "";
        session()->flash('message', 'You have successfully added the Comment');
    }

    public function remove($commentID) 
    {
        $comment = Comment::find($commentID);
        $comment -> delete();
        session()->flash('messageDeleted', 'You have successfully deleted the Comment');
    }

    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::latest()->paginate(3)
        ]);
    }
    
}
