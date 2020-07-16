@extends('layouts.app')

@section('title', "Index")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($rows->count())
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <th>{{ $row->name }}</th>
                                <th>{{ $row->description }}</th>
                                <th>{{ $row->creator }}</th>
                                <th>{{ \App\Test::getStatuses()[$row->status] }}</th>
                                <td style="display: flex">
                                    <a href="{{ route('edit', ['id' => $row->id]) }}" class="btn btn-warning mr-2">Edit</a>
                                    <form action="{{ route('destroy', ['id' => $row->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Remove"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Rows</p>
            @endif

        </div>
    </div>
@endsection

