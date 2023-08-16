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
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>العنوان باللغة العربية</th>
                                <th>العنوان باللغة الانجليزية</th>
                                <th>المشرف الاول</th>

                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theses as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->title_thesis }}</td>
                                    <td>{{ $item->en_title }}</td>
                                    @foreach ($item->supervisions as $im)
                                        <td>{{ Helper::username($im->staff_id) }}</td>
                                    @endforeach
                                    <td>
                                        @if ($item->status == 0)
                                        <span class="btn btn-secondary">في انتظار الموافقة</span>
                                        @elseif($item->status == 1)
                                        <span class="btn btn-success">قيد العمل</span>
                                        @elseif($item->status == 2)
                                        <span class="btn btn-primary">مكتمل</span>
                                        @elseif($item->status == 3)
                                        <span class="btn btn-danger">مرفوضة</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                        {{-- {{ $theses->links() }} --}}
                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
