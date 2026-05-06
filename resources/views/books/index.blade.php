@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h1 class="h3 mb-0 fw-bold">Inventory</h1>
        <p class="text-muted small mb-0">Manage your library's collection</p>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary px-4">Add New Book</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Stock</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td class="fw-medium">{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>
                            @if($book->stock > 0)
                                <span class="badge rounded-pill bg-light text-dark px-3">{{ $book->stock }} left</span>
                            @else
                                <span class="badge rounded-pill bg-danger-subtle text-danger px-3">Out of stock</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-link text-decoration-none text-muted p-2">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-decoration-none text-danger p-2" onclick="return confirm('Remove this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">No books found in the inventory.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
