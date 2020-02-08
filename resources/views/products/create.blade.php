
@extends('products.layout')
@section('content')
    <main>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Shtoni nje produkt</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Kthehuni mbrapsht</a>
                </div>
            </div>
        </div>

  <!--      @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Inputi permban gabime<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

-->

        <form action="{{ route('products.store') }}"  enctype="multipart/form-data" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <strong>Emri:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        <strong>Pershkrim:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="Pershkrim"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <div class="form-group">
                        <strong>Ngarkoni nje imazh:</strong>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Shto</button>
                </div>
            </div>
            </div>
        </form>
    </main>
@endsection
