@extends('admin.layouts.master')

@section('content')
    <div class="container my-4">
        <div class="card shadow-md">
            <div class="card-header text-center text-primary">
                <h4><i class="fas fa-book me-2"></i> Book Details</h4>
            </div>
            <div class="card-body p-4">
                @if ($book)
                    <div class="row">

                        <!-- Right Column: Cover and File -->
                        <div class="col-md-3">
                            <div class="mb-4">
                                <div class="mb-2 text-primary" style="font-weight: 700">Book Cover</div>
                                <img src="{{ asset(isset($book->cover) && $book->cover ? 'coverImages/' . $book->cover : 'coverImages/defaultCover.png') }}"
                                    alt="Book Cover" class="img-thumbnail shadow"
                                    style="width:170px; height:220px; object-fit:cover;">
                            </div>
                            <div>
                                <div class="mb-2 text-primary" style="font-weight: 700">Book File</div>
                                @if (isset($book->file))
                                    <a href="{{ asset('bookFiles/' . $book->file) }}" download
                                        class="btn btn-outline-danger" title="Download PDF">
                                        <i class="fas fa-file-pdf fa-3x"></i><br>Download PDF
                                    </a>
                                @else
                                    <span class="text-muted">No file uploaded.</span>
                                @endif
                            </div>
                        </div>

                        <!-- Left Column: Basic Book Details -->
                        <div class="col-md-9">
                            <table class="table table-borderless">
                                <tr>
                                    <th class="text-primary" width="40%">Book ID</th>
                                    <td class="text-dark">{{ $book->id }}</td>
                                </tr>
                                <tr>
                                    <th class="text-primary">Book Name</th>
                                    <td class="text-dark">{{ $book->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-primary">Author</th>
                                    <td class="text-dark">{{ $book->author_name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-primary">Published Year</th>
                                    <td class="text-dark">{{ $book->published_year ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-primary">Category</th>
                                    <td class="text-dark">{{ $book->category_name }}</td>
                                </tr>

                                <tr>
                                    <th class="text-primary">Created Date</th>
                                    <td class="text-dark">
                                        {{ isset($book->created_at) ? \Carbon\Carbon::parse($book->created_at)->format('d-m-Y') : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-primary">Description</th>
                                    <td class="text-dark text-wrap">
                                        @if (!empty($book->description))
                                            {{ $book->description }}
                                        @else
                                            <span class="text-muted">No description provided...</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        Book details not found.
                    </div>
                @endif

                <div class="my-3">
                    <a href="{{ route('admin#bookList') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('admin#bookEdit', $book->id) }}" class="btn btn-success">Edit Book</a>
                </div>
            </div>
        </div>
    </div>
@endsection
