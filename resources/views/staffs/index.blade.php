@extends('layouts.app')
@section('title')
    عرض اعضاء التدريس
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">ادارة اعضاء التدريس</h2>
            <div class="card shadow">
                <div class="card-header">
                    <a class="btn btn-primary m-2 p-2" href="{{ route('staffs.create') }}"> اضافة عضو تدريس + </a>
                </div>
                <div class="card-body">

                    <!-- table -->
                    <table class="table table-borderless table-hover" id="datatable">
                        <thead>
                            <tr>

                                <th></th>
                                <th>الاسم</th>
                                @if (auth()->user()->type_user == 1)
                                    <th>الرقم الاكاديمي</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الحالة</th>
                                @endif
                                <th>السيرة الذاتية</th>
                                @if (auth()->user()->type_user == 1)
                                    <th>التحكم</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $item)
                                <tr>
                                    <td></td>
                                    <td><a href="{{ route('stf.theses', $item->id) }}">{{ $item->name }}</a></td>
                                    @if (auth()->user()->type_user == 1)
                                        <td>{{ $item->num_acadmi }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->status)
                                                <span>مفعل</span>
                                            @else
                                                <span>غير مفعل</span>
                                            @endif
                                        </td>
                                    @endif
                                    <td><a class="btn btn-primary m-3" href="{{ URL::asset($item->cv) }}">عرض </a></td>
                                    @if (auth()->user()->type_user == 1)
                                        <td class="d-flex">
                                            <a href="{{ route('staffs.edit', $item->id) }}"
                                                class="text-white btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('staffs.destroy', $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                        {{ $staffs->links() }}
                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
