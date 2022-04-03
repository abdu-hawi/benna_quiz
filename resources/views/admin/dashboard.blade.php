@extends('admin.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">اختيار الفائزين</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        <style>
                            .small-box .icon > i {
                                left: 15px;
                                right: auto;
                            }
                            .small-box .icon>i.fa{
                                top: 40px;
                            }
                        </style>
                        <div class="row">
                            @php
                                $bg = ['info','success','warning','gradient-dark'];
                            @endphp
                            @foreach($quiz as $i => $q)
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-{{ $bg[$i-1 ?? 0] }}">
                                        <div class="small-box-footer">
                                            الإسبوع {{ $i }}
                                        </div>
                                        <div class="inner">
                                            <p>{{ $q["box_title"] }}</p>
                                            <h4>{{ $q["box_subtitle"] }}</h4>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <a class="small-box-footer" {!! $q["url"] ? 'style="cursor: pointer" onclick="getPlayer('.$i.')"' : '' !!}>
                                            {{ $q["txt_show_player"] }}
                                            {!! $q["url"] ? '<i class="fas fa-arrow-circle-left"></i>':'' !!}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')

        <script>
            function getPlayer(week){
                $.ajax({
                    url:'{!! route("home.ajax") !!}',
                    type:'get',
                    data_type:'json',
                    data: {_token:'{!! csrf_token() !!}', week_number: week},
                    success:function (data) {
                        console.log(data)
                    },
                    error:function (){
                        alert("لم يتم الارسال نرجوا المحاولة مرة أخرى")
                    }
                })
                return false
            }
        </script>

    @endpush
@endsection
