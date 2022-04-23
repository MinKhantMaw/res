@extends('layouts.master')
@section('title', 'Dish Page')
@section('content')
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Kitchen Panel</h1>
                    </div><!-- /.col -->

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                         <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>

                            <div class="card-body">
                                <table id="dish" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dishes as $dish)
                                        <tbody>
                                            <tr>
                                                <td>{{ $dish->id }}</td>
                                                <td>{{ $dish->name }}</td>
                                                <td>
                                                    <a href=""><i class="fa-solid fa-trash-can">Delete</i></a>
                                                </td>
                                                {{-- <td>
                                            <a href="{{route('dish.edit',$dish->id)}}" class="btn btn-primary">Edit</a>
                                            <form action="{{route('dish.destroy',$dish->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
<script>
    $(function() {
        $('#dish').DataTable({
            // "paging": true,
            // "lengthChange": false,
            // "searching": false,
            // "ordering": true,
            // "info": true,
            // "autoWidth": false,
            // "responsive": true,
        });
    });
</script>
