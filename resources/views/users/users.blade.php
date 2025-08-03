@extends('layouts.app') {{-- Or your main layout --}}

@section('content')
<div class="container">
    <table class="table text-center table-bordered">
        <thead class="table-light">
            <tr>
                <th>اسم المستخدم</th>
                <th>الرقم الهاتف</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="{{ $loop->even ? 'table-info' : '' }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <span class="badge bg-success">مفعل</span>
                        {{-- You can conditionally change based on $user->status --}}
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" title="تفاصيل"><i class="bi bi-info-circle"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" title="تعديل"><i class="bi bi-pencil-square text-primary"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link text-danger p-0" title="حذف"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="#" title="عرض"><i class="bi bi-eye text-info"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
