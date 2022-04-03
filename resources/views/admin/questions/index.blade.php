@push('css')
    <link rel="stylesheet" href="{!! asset('design/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}">
@endpush

@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    @include('admin.layouts.massages')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{!! $title !!}</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('questions.post') }}" method="POST" >
                                @csrf
                                <div class="card-body">

                                    @php
                                        $bg = [[],['secondary', 'white'],['light', 'dark'],['gray', 'white'],['dark', 'white'],];
                                        $week = 0;
                                    @endphp
                                    @for($w=1; $w<5; $w++)
                                        <input type="hidden" name="week_number[{{ $w }}]" value="{{ $w }}">
                                        <div id="accordion{{$w}}">
                                            <div class="card">
                                                <div class="card-header  bg-{{$bg[$w][0]}}" id="heading{{$w}}">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link text-{{$bg[$w][1]}}" data-toggle="collapse" data-target="#collapse{{$w}}" aria-expanded="{{ $w == 1 ? 'true' : 'false' }}" aria-controls="collapse{{$w}}">
                                                            أسئلة الإسبوع {{$w}}
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapse{{$w}}" class="collapse {{ $w == 1 ? 'show' : '' }}" aria-labelledby="heading{{$w}}" data-parent="#accordion{{$w}}">
                                                    <div class="card-body">
                                                        @for($q=1;$q<8;$q++)
                                                            <label class="col-12">
                                                                السؤال {{$q}} | الإسبوع {{ $w }}
                                                                <input type="text" name="question[{{$w}}][{{$q}}]" class="form-control" required>
                                                            </label>
                                                            جواب السؤال {{$q}}
                                                            @for($i = 1 ; $i<5; $i++)
                                                                <div class="form-check mt-1">
                                                                    <label class="form-check-label col-10">
                                                                        <input class="form-check-input" type="radio" value="{{ $i }}" name="correct[{{$w}}][{{$q}}]" required >
                                                                        <input type="text" name="answer[{{$w}}][{{$q}}][{{ $i }}]" class="form-control">
                                                                    </label>
                                                                </div>
                                                            @endfor
                                                            @php $week++;@endphp
                                                        @endfor
                                                        <label class="mt-3">
                                                            تاريخ نشر أسئلة {{$w}}:
                                                            <input type="date" name="date[{{$w}}]" class="form-control" required>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    @endfor
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-send">حفظ</button>
                                </div>
                            </form>
                        </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    @push('scripts')

        <script>

        </script>

        <style>

        </style>

    @endpush

@endsection

