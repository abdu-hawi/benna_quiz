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
                                        <a class="small-box-footer" {!! $q["url"] ? 'style="cursor: pointer" onclick="getPlayer('.$i.')"' : '' !!}
                                                    {!! $q["win"] ? 'style="cursor: pointer" onclick="getWinner('.$i.')"' : '' !!}>
                                            {{ $q["txt_show_player"] }}
                                            {!! $q["url"] || $q["win"] ? '<i class="fas fa-arrow-circle-left"></i>':'' !!}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                    </div>

                </div>
                <div class="row" id="table-user">
                    <div class="col-lg-12">
                        <center class="m-2 mb-4">
                            <h3>الاسبوع <span id="week-span">1</span></h3>
                        </center>
                        <table class="table">
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">الاسم</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">1</th>--}}
{{--                                <td>Mark</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">2</th>--}}
{{--                                <td>Jacob</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">3</th>--}}
{{--                                <td>Larry</td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
                        </table>
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
            var t = $('#table-user')
            t.hide()
            function getPlayer(week){
                t.hide()
                t.find('thead').remove()
                t.find('tbody').remove()
                $("#week-span").html(week)
                $.ajax({
                    url:'{!! route("home.ajax") !!}',
                    type:'get',
                    data_type:'json',
                    data: {_token:'{!! csrf_token() !!}', week_number: week, isWinner: 'isWinner'},
                    success:function (data) {
                        var txt = '<thead><tr><th scope="col">#</th><th scope="col">الاسم</th><th scope="col">رقم الهوية</th></tr></thead><tbody>'
                        for (let i = 0; i < data.length; i++){
                            txt += '<tr><th scope="row">'+(i+1)+'</th><td>'+data[i].name+'</td><td>'+data[i].national_id+'</td></tr>'
                        }
                        txt += '</tbody>'
                        $('.table').append(txt)
                        t.show()
                    },
                    error:function (){
                        alert("لم يتم الارسال نرجوا المحاولة مرة أخرى")
                    }
                })
                return false
            }
            function getWinner(week){
                t.hide()
                t.find('thead').remove()
                t.find('tbody').remove()
                $("#week-span").html(week);
                getData(week, null)
            }

            function getData(week, isWinner){
                $.ajax({
                    url:'{!! route("home.ajax") !!}',
                    type:'get',
                    data_type:'json',
                    data: {_token:'{!! csrf_token() !!}', week_number: week, isWinner: isWinner},
                    success:function (data) {
                        console.log(data)
                        var txt = '<thead><tr><th scope="col">#</th><th scope="col">الاسم</th><th scope="col">رقم الهوية</th>th scope="col">عدد الأجوبة الصحيحة</th><th scope="col">حذف</th></tr></thead><tbody>'
                        for (let i = 0; i < data.length; i++){
                            txt += '<tr><th scope="row">'+(i+1)+'</th><td>'+data[i].name+'</td><td>'+data[i].national_id+'</td><td>'+data[i].correct+'</td><td><button style="background-color: #ff253a">حذف</button></td></tr>'
                        }
                        txt += '</tbody>'
                        $('.table').append(txt)
                        t.show()
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
