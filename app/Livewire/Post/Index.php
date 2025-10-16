<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $posts = Post::latest()->paginate(10);
        return view('livewire.post.index', compact('posts'));
    }
}
