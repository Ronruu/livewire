<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Create extends Component
{
    use WithFileUploads;

    //image
    #[Rule('required', message: 'Masukkan Gambar Post')]
    #[Rule('image', message: 'File Harus Gambar')]
    #[Rule('max:1024', message: 'Ukuran File Maksimal 1MB')]
    public $image;

    //name
    #[Rule('required', message: 'Masukkan Nama Post')]
    public $name;

    //content
    #[Rule('required', message: 'Masukkan Isi Post')]
    #[Rule('min:3', message: 'Isi Post Minimal 3 Karakter')]
    public $content;

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        //store image in storage/app/public/posts
        $this->image->storeAs('posts', $this->image->hashName() , 'public');

        //create post
        Post::create([
            'name' => $this->name,
            'content' => $this->content,
            'image' => $this->image->hashName(),
            
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

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
        return view('livewire.posts.create');
    }
}