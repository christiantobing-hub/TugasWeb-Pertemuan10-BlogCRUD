<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Postingan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4">Tambah Postingan Baru</h2>
        <div class="card shadow-sm p-4">
            <form action="/posts" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Postingan</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Isi Konten</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5">{{ old('body') }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Simpan Postingan</button>
                <a href="/posts" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>