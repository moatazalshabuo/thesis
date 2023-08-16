@extends('layouts.app')

@section('title')
    عرض الطلاب
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">ادارة الطلاب</h2>
            <div class="card shadow">
                <div class="card-header">
                    <a class="btn btn-primary m-2 p-2" href="{{ route('students.create') }}"> اضافة طالب + </a>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover" id="datatable">
                        <thead>
                            <tr>

                                <th></th>
                                <th>الاسم</th>
                                <th>الرقم الاكاديمي</th>
                                <th>البريد الالكتروني</th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->num_acadmi }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->status)
                                            <span>مفعل</span>
                                        @else
                                            <span>غير مفعل</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('students.edit', $item->id) }}" class="text-white btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <form action="{{ route('students.destroy', $item->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                        {{ $students->links() }}
                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
