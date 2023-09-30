@extends('layouts.app')

@section('title')
    الطروحات
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">ادارة الاطروحات</h2>
            <div class="card shadow">

                <div class="card-body">

                    <!-- table -->
                    <table class="table table-borderless table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th></th>
                                <th>العنوان باللغة العربية</th>
                                <th>العنوان باللغة الانجليزية</th>
                                <th>الطالب</th>
                                <th>الحالة</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theses as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->title_thesis }}</td>
                                    <td>{{ $item->en_title }}</td>
                                    <td>{{ $item->students->name }}</td>
                                    <td>
                                        @if ($item->status == 0)
                                            <span>في انتظار الموافقة</span>
                                        @elseif($item->status == 1)
                                            <span>قيد العمل</span>
                                        @elseif($item->status == 2)
                                            <span>مكتملة</span>
                                        @elseif($item->status == 3)
                                            <span>مرفوضة</span>
                                        @endif
                                    </td>
                                    <td>
                                       <a href="{{ route('thesesShow.admin',$item->id) }}" class="btn btn-primary">عرض</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">

                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
