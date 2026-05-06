@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-bold">{{ isset($book) ? 'Edit Book' : 'New Book' }}</h1>
            <a href="{{ route('books.index') }}" class="btn btn-link text-decoration-none text-muted p-0">Cancel</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}" method="POST">
                    @csrf
                    @if(isset($book))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="title" class="form-label small fw-bold text-muted text-uppercase">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title ?? '') }}" placeholder="e.g. The Great Gatsby" required>
                    </div>

                    <div class="mb-4">
                        <label for="author" class="form-label small fw-bold text-muted text-uppercase">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author ?? '') }}" placeholder="e.g. F. Scott Fitzgerald" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="published_year" class="form-label small fw-bold text-muted text-uppercase">Year</label>
                            <input type="number" class="form-control" id="published_year" name="published_year" value="{{ old('published_year', $book->published_year ?? date('Y')) }}" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="stock" class="form-label small fw-bold text-muted text-uppercase">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $book->stock ?? 0) }}" required min="0">
                        </div>
                    </div>

                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-primary">{{ isset($book) ? 'Update' : 'Create' }} Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
