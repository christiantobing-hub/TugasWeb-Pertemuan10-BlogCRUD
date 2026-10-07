<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Postingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <p class="text-muted"><small>Dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}</small></p>
            <hr>
            <p class="fs-5" style="white-space: pre-line;">{{ $post->body }}</p>
            <div class="mt-4">
                <a href="/posts" class="btn btn-secondary">Kembali ke Daftar Blog</a>
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit Postingan</a>
            </div>
        </div>
    </div>
</body>
</html>