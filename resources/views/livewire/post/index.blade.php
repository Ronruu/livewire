@section('title')
Data Posts Belajar Livewire
@endsection

<div class="container mb5 mt5">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
                
            @endif

            <a href="/create" wire:navigate class="btn btn-md btn-sm rounded shadow-sm border-0 btn-success mb-3 mt-3">Tambah Post</a>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Content</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->name }}</td>
        <td>{{ $post->content }}</td>
        <td>
            <img src="{{ asset('storage/posts/'.$post->image) }}" width="100">
        </td>
        <td>
            <a href="/edit/{{ $post->id }}" wire:navigate class="btn btn-sm btn-primary">EDIT</a>
            <button class="btn btn-sm btn-danger">DELETE</button>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center text-danger">Data Post belum tersedia.</td>
    </tr>
@endforelse

                    </tbody>
                </table>
            </div>
        {{ $posts->links('vendor.pagination.bootstrap-5') }}

    </div>
</div>