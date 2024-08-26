<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Update</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(session('error'))
            <p class="text-danger">{{session('error')}}</p>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            @if($category->images)
                <img src="{{ asset($category->images) }}" alt="category Image" class="img-thumbnail mb-2" style="max-width: 200px;">
            @endif

            <!-- Allow uploading a new image -->
            <input type="file" class="form-control" name="image">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


</body>
</html>
