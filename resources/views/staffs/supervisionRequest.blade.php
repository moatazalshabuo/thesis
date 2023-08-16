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
                <div class="card-header">
                    <h5 class="card-title">طلبات الاشراف</h5>
                </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thesis as $item)

                                <tr>
                                    <td></td>
                                    <td>{{ $item->thesis->title_thesis }}</td>
                                    <td>{{ $item->thesis->en_title }}</td>
                                    <td>{{ Helper::username($item->thesis->students_id) }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('Supervision.active',$item->id)}}">الموافقة</a>
                                        <a class="btn btn-danger" href="{{route('Supervision.deactive',$item->id)}}">الرفض</a>
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
