@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 fw-bold">Update Record</h1>
            <a href="{{ route('borrowings.index') }}" class="btn btn-link text-decoration-none text-muted p-0">Back</a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('borrowings.update', $borrowing) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Book</label>
                        <input type="text" class="form-control bg-light" value="{{ $borrowing->book->title }}" readonly disabled>
                        <input type="hidden" name="book_id" value="{{ $borrowing->book_id }}">
                    </div>

                    <div class="mb-4">
                        <label for="borrower_name" class="form-label small fw-bold text-muted text-uppercase">Borrower Name</label>
                        <input type="text" class="form-control" id="borrower_name" name="borrower_name" value="{{ old('borrower_name', $borrowing->borrower_name) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="borrowed_at" class="form-label small fw-bold text-muted text-uppercase">Borrow Date</label>
                            <input type="date" class="form-control" id="borrowed_at" name="borrowed_at" value="{{ old('borrowed_at', $borrowing->borrowed_at->format('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="returned_at" class="form-label small fw-bold text-muted text-uppercase">Return Date</label>
                            <input type="date" class="form-control" id="returned_at" name="returned_at" value="{{ old('returned_at', $borrowing->returned_at ? $borrowing->returned_at->format('Y-m-d') : '') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label small fw-bold text-muted text-uppercase">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="borrowed" {{ old('status', $borrowing->status) == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            <option value="returned" {{ old('status', $borrowing->status) == 'returned' ? 'selected' : '' }}>Returned</option>
                        </select>
                    </div>

                    <div class="d-grid mt-2">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
