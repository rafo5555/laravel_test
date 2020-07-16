@extends('layouts.app')

@section('title', "Edit Content")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit') }}</div>
                    <div class="card-body">
                        @if(\Session::has('message'))
                            <h2 class="invalid-feedback text-center" role="alert" style="display: block">
                                <strong>{{ \Session::get('message') }}</strong>
                            </h2>
                        @endif
                        <form method="POST" action="{{ route('update', ['id' => $row->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $row->name }}"  autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="creator" class="col-md-4 col-form-label text-md-right">{{ __('Creator') }}</label>
                                <div class="col-md-6">
                                    <input id="creator" type="text" class="form-control @error('creator') is-invalid @enderror" name="creator" value="{{ $row->creator }}" autocomplete="creator" autofocus>
                                    @error('creator')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                        <option value="">Select Status</option>
                                        @foreach($statuses as $key => $status)
                                            <option value="{{ $key }}" {{ $row->status == $key ? 'selected' : '' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" rows="5" class="form-control  @error('description') is-invalid @enderror">{{ $row->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

