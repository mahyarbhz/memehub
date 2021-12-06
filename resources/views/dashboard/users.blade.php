@extends('layouts.base')

@section('title')
    Users
@endsection

@section('content')
    <div>
        <style>
            table{
                width:100%;
                table-layout: fixed;
            }
            .tbl-header{
                /*background-color: rgba(255,255,255,0.3);*/
                background-color: rgba(80, 80, 80, 0.6);
            }
            .tbl-content{
                height:300px;
                overflow-x:auto;
                margin-top: 0px;
                border: 1px solid rgba(80, 80, 80, 0.3);
            }
            th{
                padding: 20px 15px;
                text-align: left;
                font-weight: 500;
                font-size: 12px;
                color: #fff;
                text-transform: uppercase;
            }
            td{
                padding: 15px;
                text-align: left;
                vertical-align:middle;
                font-weight: 300;
                font-size: 12px;
                color: rgba(80, 80, 80, 0.9);
                border-bottom: solid 1px rgba(80, 80, 80, 0.1);
            }
            body{
                /*background: -webkit-linear-gradient(left, #25c481, #25b7c4);*/
                /*background: linear-gradient(to right, #25c481, #25b7c4);*/
            }
            section{
                margin: 50px;
            }
            ::-webkit-scrollbar {
                width: 6px;
            }
            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
            ::-webkit-scrollbar-thumb {
                -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
        </style>

        <section>
            <div class="tbl-header">
                <table>
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Last Seen</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table>
                    <tbody>
                    @foreach($data as $user)
                        <tr>
                            <td>{{ $user->name }} <i class="fas fa-circle" style="font-size: 8px;color: @if(\Illuminate\Support\Facades\Cache::has('is_online' . $user->id)) green @else red @endif"></i></td>
                            <td>{{ $user->email }}</td>
                            <td>@if(\Illuminate\Support\Facades\Cache::has('is_online' . $user->id)) <span class="text-green-800">Online</span> @else {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }} @endif</td>
                            <td>{{ $user->role->scope }}</td>
                            <td><a href="{{ route('owners.uedit', $user->id) }}" class="transition duration-200 ease-in-out mx-1 px-1 py-1 hover:text-yellow-600"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection

@section('customJS')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();
    </script>
@endsection
