@extends('admin.layouts.master')

@section('content')
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-header text-center text-primary">
                <h4><i class="fas fa-book me-2"></i> Update Category</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin#categoryUpdate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text"
                            class="form-control border-success @error('name')
                        is-invalid
                    @enderror"
                            id="categoryName" name="name" value="{{ old('name', $category->name) }}"
                            placeholder="Enter category name">
                        @error('name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="categoryDesc" class="form-label">Description</label>
                        <textarea
                            class="form-control border-success
                    @error('description')
                        is-invalid
                    @enderror"
                            id="categoryDesc" name="description" rows="5" placeholder="Short description...">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="justify-content-start mt-4">
                        <a type="button" class="btn btn-secondary text-white" href="{{ route('admin#category') }}">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </a>
                        <button type="submit" class="btn bg-success text-white">
                            <i class="fas fa-edit me-2"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
