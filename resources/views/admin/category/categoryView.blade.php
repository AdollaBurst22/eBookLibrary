@extends('admin.layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i> Category Details

                        </h4>
                        <h5 class="my-3">{{ $category->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-dark"><strong>Category ID:</strong> {{ $category->id }}</p>
                        <p class="text-dark"><strong>CategoryName:</strong> {{ $category->name }}</p>
                        <p class="text-dark"><strong>Category Description:</strong> {{ $category->description }}</p>


                        <p class="text-warning"><strong>Total Books:</strong> {{ $booksCount ?? '0' }}</p>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin#category') }}" class="btn btn-secondary btn-sm text-white">
                            <i class="fas fa-arrow-left me-1"></i> Back to Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h4 class="mb-4 text-center text-primary"><i class="fas fa-book-open me-2"></i> Recent Books in
                    "{{ $category->name }}"</h4>
            </div>
            @forelse ($recentBooks as $book)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-light">
                        @if (isset($book->cover_image) && $book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top"
                                alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-book-cover.png') }}" class="card-img-top" alt="Default Cover"
                                style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ Str::limit($book->title, 40) }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $book->author ?? 'Unknown Author' }}</h6>
                            <p class="card-text flex-grow-1 text-secondary">{{ Str::limit($book->description, 100) }}</p>
                            <div class="mt-auto text-end">
                                {{-- Assuming a route for viewing individual books, replace '#' with actual route --}}
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i> View Book
                                </a>
                            </div>
                        </div>
                        <div class="card-footer text-muted text-end">
                            <small>Added: {{ $book->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-4">
                    <p class="lead">No recent books found in this category.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('script')
@endsection
