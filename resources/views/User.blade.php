@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <a class="btn btn-outline-dark" href="/home">Beranda</a>
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h1>
                                Pelanggan
                            </h1>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" id="user-tab" data-toggle="pill" href="#pegguna-tab" role="tab" aria-controls="pegguna-tab" aria-selected="true">Pelanggan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="booking-tab" data-toggle="pill" href="#blokirPengguna-tab" role="tab" aria-controls="bookings-tab" aria-selected="false">Blokir</a>
                                </li>
                            </ul>
                            <br>

                            <div class="tab-content">
                                {{-- Pengguna --}}
                                <div class="tab-pane show active" id="pegguna-tab" role="tabpanel" aria-labelledby="pegguna-tab">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="5%">#</th>
                                                <th scope="col" width="15%">Avatar</th>
                                                <th scope="col" width="32%">Nama</th>
                                                <th scope="col" width="32%">E-mail</th>
                                                <th scope="col" width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Users as $Key => $User)
                                                <tr>
                                                    <th scope="row">{{ ++$Key }}</th>
                                                    @if(!empty($User->avatar))
                                                      <td><img src="{{asset('storage/blog/' . $User->avatar)}}" style="max-height:34px;max-width:100%;"></td>
                                                    @else
                                                      <td>-</td>
                                                    @endif
                                                    <td>{{ $User->name }}</td>
                                                    <td>{{ $User->email }}</td>
                                                    <td>
                                                        <a href="/pelanggan/{{$User->id}}" class="btn btn-dark" style="width: 120px;">Info</a>
                                                    </td>
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
                                                <th scope="col">#</th>
                                                <th scope="col">Avatar</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($UsersBlocked as $Key => $User)
                                                <tr>
                                                    <th scope="row">{{ ++$Key }}</th>
                                                    <td>
                                                        @if(!empty($User->avatar))
                                                        <img class="img-thumbnail" width="50" src="{{asset('storage/blog/' . $User->avatar)}}" alt="">
                                                        @else
                                                            <img class="img-thumbnail" width="50" src="{{ $User->avatar }}" alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{ $User->name }}</td>
                                                    <td>{{ $User->email }}</td>
                                                    <td>
                                                        <a href="/pelanggan/{{$User->id}}" class="btn btn-dark" style="width: 120px;">Info</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
