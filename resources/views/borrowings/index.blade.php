@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h1 class="h3 mb-0 fw-bold">Borrowings</h1>
        <p class="text-muted small mb-0">Track active loans and returns</p>
    </div>
    <a href="{{ route('borrowings.create') }}" class="btn btn-primary px-4">New Transaction</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Borrower</th>
                        <th>Borrowed at</th>
                        <th>Returned at</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowings as $borrowing)
                    <tr>
                        <td class="fw-medium">{{ $borrowing->book->title }}</td>
                        <td>{{ $borrowing->borrower_name }}</td>
                        <td>{{ $borrowing->borrowed_at->format('M d, Y') }}</td>
                        <td>{{ $borrowing->returned_at ? $borrowing->returned_at->format('M d, Y') : '—' }}</td>
                        <td>
                            <span class="badge rounded-pill px-3 {{ $borrowing->status === 'borrowed' ? 'badge-borrowed' : 'badge-returned' }}">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('borrowings.edit', $borrowing) }}" class="btn btn-link text-decoration-none text-muted p-2">Details</a>
                            <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-decoration-none text-danger p-2" onclick="return confirm('Delete record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No borrowing records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
