@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row g-5">
                <div class="col-5">
                    <form action="{{ route('admin#bookList', ['action' => 'filter']) }}" method="get">
                        <div class="input-group">
                            <select class="form-control" name="filterKey" id="filterKey">
                                <option value="0">Filter By...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (request('filterKey') == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button typr="submit" class="btn bg-primary ml-2 text-white">Filter</button>
                            <a href="{{ route('admin#bookList') }}" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
                <div class="col-5 offset-2">
                    <form action="{{ route('admin#bookList', ['action' => 'search']) }}" method="get">

                        <div class="input-group">
                            <input type="text" name="searchKey" value="{{ request('searchKey') }}" class=" form-control"
                                placeholder="Search Book...">
                            <button type="submit" class=" btn text-primary"> <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="card mt-4">
                <div class="card-header text-center text-primary">
                    <h4><i class="fas fa-list me-2"></i> Book List</h4>
                </div>

                <div class="table-responsive" style="overflow-x: auto; white-space: nowrap; width: 100%;">
                    <table class="table table-hover text-dark mb-0 align-middle" style="min-width: 1000px;">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Cover</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th>Published Year</th>
                                <th>Category Name</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="col-2">
                                        <img src="{{ asset($book->book_cover ? 'coverImages/' . $book->book_cover : 'coverImages/defaultCover.png') }}"
                                            alt="Cover Image" class="img-thumbnail h-75 w-75">
                                    </td>
                                    <td>{{ $book->book_name }}</td>
                                    <td>{{ $book->author_name }}</td>
                                    <td>{{ $book->published_year }}</td>
                                    <td>{{ $book->category_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($book->created_date)) }}</td>
                                    <td class="text-end pr-5">
                                        <a href="{{ route('admin#bookView', $book->id) }}" class="text-success me-3"
                                            title="View"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin#bookEdit', $book->id) }}" class="text-dark me-3"
                                            title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin#bookDelete', $book->id) }}" class="text-danger"
                                            title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <div class="d-flex justify-content-end">
            {{ $books->links() }}
        </div>
    </div>
    </div>
@endsection

@section('script')
@endsection
