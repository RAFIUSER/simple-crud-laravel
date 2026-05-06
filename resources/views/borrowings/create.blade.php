@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-bold">Record Loan</h1>
            <a href="{{ route('borrowings.index') }}" class="btn btn-link text-decoration-none text-muted p-0">Cancel</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('borrowings.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="book_id" class="form-label small fw-bold text-muted text-uppercase">Select Book</label>
                        <select class="form-select" id="book_id" name="book_id" required>
                            <option value="">Choose a book...</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                    {{ $book->title }} ({{ $book->stock }} left)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="borrower_name" class="form-label small fw-bold text-muted text-uppercase">Borrower Name</label>
                        <input type="text" class="form-control" id="borrower_name" name="borrower_name" value="{{ old('borrower_name') }}" placeholder="Full Name" required>
                    </div>

                    <div class="mb-4">
                        <label for="borrowed_at" class="form-label small fw-bold text-muted text-uppercase">Borrow Date</label>
                        <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at', date('Y-m-d')) }}" required>
                    </div>

                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-primary">Complete Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
