<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowingRequest;
use App\Http\Requests\UpdateBorrowingRequest;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('book')->latest()->get();
        return view('borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $books = Book::where('stock', '>', 0)->get();
        return view('borrowings.create', compact('books'));
    }

    public function store(StoreBorrowingRequest $request)
    {
        $book = Book::findOrFail($request->book_id);
        
        if ($book->stock <= 0) {
            return back()->withErrors(['book_id' => 'Stok buku habis.']);
        }

        Borrowing::create($request->validated() + ['status' => 'borrowed']);
        
        $book->decrement('stock');

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'books'));
    }

    public function update(UpdateBorrowingRequest $request, Borrowing $borrowing)
    {
        $oldStatus = $borrowing->status;
        $newStatus = $request->status;

        $borrowing->update($request->validated());

        if ($oldStatus === 'borrowed' && $newStatus === 'returned') {
            $borrowing->book->increment('stock');
        } elseif ($oldStatus === 'returned' && $newStatus === 'borrowed') {
            $borrowing->book->decrement('stock');
        }

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman diperbarui.');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'borrowed') {
            $borrowing->book->increment('stock');
        }
        
        $borrowing->delete();
        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman dihapus.');
    }
}
