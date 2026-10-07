<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dominggus Store - Blog List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Blog Tugas Rutin 10</h1>
        <a href="/posts/create" class="btn btn-primary mb-3">+ Tambah Postingan Baru</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                @if(isset($posts) && count($posts) > 0)
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5><a href="/posts/{{ $post->id }}" class="text-decoration-none">{{ $post->title }}</a></h5>
                                    <p class="text-muted mb-0">{{ Str::limit($post->body, 100) }}</p>
                                </div>
                                <div>
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="/posts/{{ $post->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">Belum ada postingan yang dibuat.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>