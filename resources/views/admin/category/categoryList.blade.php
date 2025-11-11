@extends('admin.layouts.master')


@section('content')
    <div class="container">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card shadow-md">
                    <div class="card-header text-center text-primary">
                        <i class="fas fa-book me-2"></i> Add New Book Category
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin#categoryCreate') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text"
                                    class="form-control border-success @error('name')
                                    is-invalid
                                @enderror"
                                    id="categoryName" name="name" value="{{ old('name') }}"
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
                                    id="categoryDesc" name="description" rows="5" placeholder="Short description...">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-plus-circle me-2"></i> Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="">
                    <form action="{{ route('admin#category') }}" method="get">

                        <div class="input-group">
                            <input type="text" name="searchKey" value="{{ request('searchKey') }}" class=" form-control"
                                placeholder="Search Category...">
                            <button type="submit" class=" btn text-primary"> <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card mt-4">
                    <div class="card-header text-center text-primary">
                        <i class="fas fa-list me-2"></i> Existing Categories
                    </div>

                    <table class="table table-hover text-dark mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <span class="me-5">{{ $loop->iteration }}.</span>
                                    </td>
                                    <td>
                                        <span class="ms-2">{{ Str::limit($category->name, 30) }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin#categoryView', $category->id) }}"
                                            class="text-success pr-2 me-5" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin#categoryEdit', $category->id) }}"
                                            class="text-dark pr-2 me-5" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin#categoryDelete', $category->id) }}" class="text-danger"
                                            title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- End loop -->
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $categories->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
