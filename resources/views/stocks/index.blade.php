@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stocky</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stocks.create') }}" title="Create a stock"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stocks as $stock)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->description }}</td>
                <td>{{ $stock->quantity }}</td>
                <td>{{ $stock->price }}</td>
                <td>{{ date_format($stock->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">

                        <a href="{{ route('stocks.show', $stock->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('stocks.edit', $stock->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $stocks->links() !!}

@endsection