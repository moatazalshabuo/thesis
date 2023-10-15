@extends('layouts.app')

@section('title')
    التقييم السري
@endsection
@section('content')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">التقييم السري</h2>
            <div class="card shadow">
                <div class="card-header">
                    <a class="btn btn-primary m-2 p-2" href="{{ route('secret.create') }}"> تقييم اطروحة جديدة </a>
                </div>
                <div class="card-body">
                    <!-- table -->
                    <table class="table table-borderless table-hover" id="datatable">
                        <thead>
                            <tr>

                                <th></th>
                                <th>ٱلاطروحة</th>
                                <th>المقيم</th>
                                <th>الحالة</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($secret as $item)
                                <tr>
                                    <td><a href="{{ route('secret.show',$item->id) }}" class="btn btn-success">عرض </a></td>
                                    <td> {{ $item->theses->title_thesis }}</td>
                                    <td>{{ $item->Staff->name }}</td>
                                    {{-- <td>{{ $item->email }}</td> --}}
                                    <td>
                                        @if ($item->status)
                                            <span>تم التقييم</span>
                                        @else
                                            <span>غير مقيمه</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                       
                                        <form action="{{ route('secret.destroy', $item->id) }}" method="POST">
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
                    </nav>
                </div>
            </div>
        </div> <!-- customized table -->
    </div> <!-- end section -->
@endsection
