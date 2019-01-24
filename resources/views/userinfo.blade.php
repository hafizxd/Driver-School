@extends('layouts.app')

@section('title') User Info | DriverSchool @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <a href="/user" class="btn btn-outline-dark" style="margin-bottom:20px;">Back</a>
            <div class="card">
                <div class="card-header">
                  <a class="btn btn-outline-danger" href="#" role="button">Block</a>
                </div>
                <div class="card-body">
                  <form action="/user/{{$Users->id}}/edit" method="post" enctype="multipart/form-data">
                      @if(!empty($Users->avatar))
                        <img src="{{asset('storage/blog/' . $Users->avatar)}}" alt="foto-profil" style="width:50%;margin:auto;margin-bottom:10px;display:block;">
                      @endif
                    <div class="form-group">
                      <input name="avatar" type="file" class="from-control-file">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input name="name" type="text" class="form-control" value="{{ $Users->name }}">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input name="email" type="email" class="form-control" value="{{ $Users->email }}">
                    </div>
                    <div class="form-group">
                      <label>Wilayah</label>
                      <input name="wilayah" type="text" class="form-control" value="{{ $Users->wilayah }}">
                    </div>
                    <div class="form-group">
                      <label>Phone</label>
                      <input name="phone" type="number" class="form-control" value="{{ $Users->phone }}">
                    </div>
                    <div class="form-group">
                      <label>Bergabung Pada</label>
                      <input name="date" type="text" class="form-control" value="{{ $Users->created_at->format('l, j F Y h:i A') }}" readonly>
                    </div>
                    <input class="btn btn-outline-primary" type="submit" name="submit" value="Simpan" style="margin-top:20px;">
                      {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                      <hr width="90%">
                    </div>
                  </form>

                  <h3 style="text-align:center;margin-top:40px;">Anak</h3>
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th scope="col" width="20%">#</th>
                              <th scope="col" width="50%">Nama</th>
                              <th scope="col" width="30%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($Users->childs as $Key => $Child)
                              <tr>
                                  <th scope="row">{{ ++$Key }}</th>
                                  <td>{{ $Child->nama }}</td>
                                  <td>
                                      <a href="/user/{{$Users->id}}/child/{{$Child->id}}" class="btn btn-dark" style="width: 60px;">Info</a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
             </div>
         </div>
     </div>
 </div>
@endsection
