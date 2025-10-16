<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    use WithFileUploads;

    //id post
    public $postID;

    //image
    public $image;

    #[Rule('required', message: 'Masukkan Judul Post')]
    public $name;

    #[Rule('required', message: 'Masukkan Isi Post')]
    #[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
    public $content;

    public function mount($id)
    {
        //get post
        $post = Post::find($id);

        //assign
        $this->postID   = $post->id;
        $this->name    = $post->name;
        $this->content  = $post->content;
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        //get post
        $post = Post::find($this->postID);

        //check if image
        if ($this->image) {

            //store image in storage/app/public/posts
            $this->image->storeAs('posts', $this->image->hashName(), 'public');

            //update post
            $post->update([
                'image' => $this->image->hashName(),
                'name' => $this->name,
                'content' => $this->content,
            ]);
        } else {

            //update post
            $post->update([
                'name' => $this->name,
                'content' => $this->content,
            ]);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('posts.index');
    }

    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.posts.edit');
    }
}