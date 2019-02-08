@extends('layouts.app')

@section('title') Home | DriverSchool @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- List Navigation --}}
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @if(Auth::user()->role == 3)
                    <li class="nav-item">
                        <a class="nav-link active" id="user-tab" data-toggle="pill" href="#users-tab" role="tab" aria-controls="users-tab" aria-selected="true" onclick="localStorage.setItem('k', 1);">Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="driver-tab" data-toggle="pill" href="#drivers-tab" role="tab" aria-controls="drivers-tab" aria-selected="false" onclick="localStorage.setItem('k', 2);">Supir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/order">Langganan</a>
                    </li>
                @else
                    <a class="nav-link active" id="driver-tab" data-toggle="pill" href="#drivers-tab" role="tab" aria-controls="drivers-tab" aria-selected="false">Supir</a>
                @endif
            </ul>
        </div>
    </div>


    {{-- Wrapper Navigation Content --}}
    <div class="tab-content" id="pills-tabContent">


        @if(Auth::user()->role == 3)
            {{-- Content Pengguna --}}
            <div class="tab-pane fade show active" id="users-tab" role="tabpanel" aria-labelledby="users-tab">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h1>
                                    Pengguna
                                </h1>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="penggunaNav-tab" data-toggle="pill" href="#pegguna-tab" role="tab" aria-controls="pegguna-tab" aria-selected="true" onclick="localStorage.setItem('i', 1);">Pelanggan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="booking-tab" data-toggle="pill" href="#blokirPengguna-tab" role="tab" aria-controls="bookings-tab" aria-selected="false" onclick="localStorage.setItem('i', 2);">Blokir</a>
                                    </li>
                                </ul>
                                <br>

                                <div class="tab-content">
                                    {{-- Pengguna --}}
                                    <div class="tab-pane show active" id="pegguna-tab" role="tabpanel" aria-labelledby="pegguna-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Users as $Key => $User)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $User->name }}</td>
                                                        <td>{{ $User->email }}</td>
                                                        <td>{{ $User->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Blokir --}}
                                    <div class="tab-pane" id="blokirPengguna-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($UsersBlocked as $Key => $User)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $User->name }}</td>
                                                        <td>{{ $User->email }}</td>
                                                        <td>{{ $User->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a style="font-weight:bold;font-size:23px;"  href="/user">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="drivers-tab" role="tabpanel" aria-labelledby="drivers-tab">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h1>
                                    Supir
                                </h1>
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-pills">
                                    @if(Auth::user()->role == 3)
                                        <li class="nav-item">
                                            <a class="nav-link active" id="supirNav-tab" data-toggle="pill" href="#supir-tab" role="tab" aria-controls="supir-tab" aria-selected="true" onclick="localStorage.setItem('supir', 1);">Supir</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="blokirSupirNav-tab" data-toggle="pill" href="#blokirSupir-tab" role="tab" aria-controls="blokirSupir-tab" aria-selected="false" onclick="localStorage.setItem('supir', 2);">Blokir</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pendingSupirNav-tab" data-toggle="pill" href="#pendingSupir-tab" role="tab" aria-controls="pendingSupir-tab" aria-selected="false" onclick="localStorage.setItem('supir', 3);">Pending</a>
                                        </li>
                                    @endif
                                </ul>
                                <br>

                                <div class="tab-content">
                                    {{-- Supir --}}
                                    <div class="tab-pane show active" id="supir-tab" role="tabpanel" aria-labelledby="supir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Drivers as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Blokir --}}
                                    <div class="tab-pane" id="blokirSupir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($DriversBlocked as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Pending --}}
                                    <div class="tab-pane" id="pendingSupir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($DriversPending as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a style="font-weight:bold;font-size:23px;"  href="/driver">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            {{-- Content Supir --}}
            <div class="tab-pane fade show active" id="drivers-tab" role="tabpanel" aria-labelledby="drivers-tab">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h1>
                                    Supir
                                </h1>
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="user-tab" data-toggle="pill" href="#supir-tab" role="tab" aria-controls="supir-tab" aria-selected="true">Supir</a>
                                    </li>
                                </ul>
                                <br>

                                <div class="tab-content">
                                    {{-- Supir --}}
                                    <div class="tab-pane show active" id="supir-tab" role="tabpanel" aria-labelledby="supir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($Drivers as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Blokir --}}
                                    <div class="tab-pane" id="blokirSupir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($DriversBlocked as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Pending --}}
                                    <div class="tab-pane" id="pendingSupir-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="10%">#</th>
                                                    <th scope="col" width="35%">Nama</th>
                                                    <th scope="col" width="35%">E-mail</th>
                                                    <th scope="col" width="20%">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($DriversPending as $Key =>  $Driver)
                                                    <tr>
                                                        <th scope="row">{{ ++$Key }}</th>
                                                        <td>{{ $Driver->name }}</td>
                                                        <td>{{ $Driver->email }}</td>
                                                        <td>{{ $Driver->phone }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a style="font-weight:bold;font-size:23px;"  href="/driver">More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    var l = localStorage.getItem("k");
    if (l == 2){
        document.getElementById("driver-tab").classList.add('active');
        document.getElementById("drivers-tab").classList.add('show', 'active');
        document.getElementById("user-tab").classList.remove('active');
        document.getElementById("users-tab").classList.remove('show', 'active');
    }



    var j = localStorage.getItem("i");
    if (j == 2){
        document.getElementById("booking-tab").classList.add('active');
        document.getElementById("blokirPengguna-tab").classList.add('show', 'active');
        document.getElementById("penggunaNav-tab").classList.remove('active');
        document.getElementById("pegguna-tab").classList.remove('show', 'active');
    }



    var v = localStorage.getItem("supir");
    if (v == 2){
        document.getElementById("blokirSupirNav-tab").classList.add('active');
        document.getElementById("blokirSupir-tab").classList.add('show', 'active');
        document.getElementById("supirNav-tab").classList.remove('active');
        document.getElementById("supir-tab").classList.remove('show', 'active');
        document.getElementById("pendingSupirNav-tab").classList.remove('active');
        document.getElementById("pendingSupir-tab").classList.remove('show', 'active');
    }

    if (v == 3){
        document.getElementById("pendingSupirNav-tab").classList.add('active');
        document.getElementById("pendingSupir-tab").classList.add('show', 'active');
        document.getElementById("blokirSupirNav-tab").classList.remove('active');
        document.getElementById("blokirSupir-tab").classList.remove('show', 'active');
        document.getElementById("supirNav-tab").classList.remove('active');
        document.getElementById("supir-tab").classList.remove('show', 'active');
    }
</script>

@endsection
