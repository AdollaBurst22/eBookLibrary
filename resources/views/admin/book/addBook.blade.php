@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="card shadow-md">
            <div class="card-header text-center text-primary">
                <h4><i class="fas fa-book me-2"></i> Add New Book</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin#bookUpload', ['action' => 'upload']) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bookName" class="form-label">Book Name</label>
                                <input type="text"
                                    class="form-control border-success @error('name')
                                        is-invalid
                                    @enderror"
                                    id="bookName" name="name" value="{{ old('name') }}" placeholder="Enter Book name">
                                @error('name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="authorName" class="form-label">Author Name</label>
                                <input type="text"
                                    class="form-control border-success @error('authorName')
                                        is-invalid
                                    @enderror"
                                    id="authorName" name="authorName" value="{{ old('authorName') }}"
                                    placeholder="Enter Author name">
                                @error('authorName')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category</label>
                                <select
                                    class="form-control border-success @error('categoryId')
                                    is-invalid
                                @enderror"
                                    name="categoryId" id="categoryId">
                                    <option value="">Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('categoryId') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('categoryId')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="publishedYear" class="form-label">Published Year</label>
                                <input type="number" class="form-control border-success" id="publishedYear"
                                    name="publishedYear" value="{{ old('publishedYear') }}"
                                    placeholder="Enter Published Year" min="1800" max="2100">
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Book</label>
                                <input type="file" accept="application/pdf"
                                    class="form-control border-success @error('file')
                                        is-invalid
                                    @enderror"
                                    id="file" name="file" value="{{ old('file') }}">
                                @error('file')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="coverImg" class="form-label">Upload Book Cover</label>
                                <input type="file" accept="image/*" class="form-control border-success" id="coverImg"
                                    name="coverImg" value="{{ old('coverImg') }}">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Book Description</label>
                        <textarea class="form-control border-success
                            id="description" name="description"
                            rows="5" placeholder="Short description of the book...">{{ old('description') }}</textarea>
                    </div>

                    <div class="text-start mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus-circle me-2"></i> Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('script')
@endsection
