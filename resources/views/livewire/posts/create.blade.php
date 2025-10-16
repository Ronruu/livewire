@section('title')
Create Post - Belajar Livewire 3 di SantriKoding.com
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit="store" enctype="multipart/form-data">

                        <div class="form-group mb-4">

                            <label class="fw-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" wire:model="image">

                            <!-- error message untuk title -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">NAMA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name" placeholder="Masukkan Nama Post">

                            <!-- error message untuk name -->
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">KONTEN</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" wire:model="content" rows="5" placeholder="Masukkan Konten Post"></textarea>

                            <!-- error message untuk content -->
                            @error('content')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>