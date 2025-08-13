@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Daftar Tagihan Siswa</h2>
        <a href="{{ route('student_bills.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 text-left">Nama Siswa</th>
                    <th class="p-2 text-left">Tipe</th>
                    <th class="p-2 text-right">Jumlah</th>
                    <th class="p-2 text-left">Jatuh Tempo</th>
                    <th class="p-2 text-center">Status</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                    <tr class="border-b">
                        <td class="p-2">{{ $bill->student->fullname ?? '-' }}</td>
                        <td class="p-2">{{ ucfirst($bill->type) }}</td>
                        <td class="p-2 text-right">Rp {{ number_format($bill->amount, 2, ',', '.') }}</td>
                        <td class="p-2">{{ $bill->due_date ? \Carbon\Carbon::parse($bill->due_date)->format('d/m/Y') : '-' }}</td>
                        <td class="p-2 text-center">
                            <span class="{{ $bill->is_paid ? 'text-green-600' : 'text-red-600' }}">
                                {{ $bill->is_paid ? 'Lunas' : 'Belum Lunas' }}
                            </span>
                        </td>
                        <td class="p-2 text-center">
                            <a href="{{ route('student-bills.edit', $bill->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('student-bills.destroy', $bill->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Hapus tagihan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $bills->links() }}
        </div>
    </div>
</div>
@endsection
