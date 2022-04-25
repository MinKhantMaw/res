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
                        <a href="{{ route('dishes.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                            Create New Dish</a>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Dishes Table</h3>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table id="dish" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Dish Name</th>
                                            <th>Category Name</th>

                                            <th>Created Up</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    @foreach ($dishes as $dish)
                                        <tbody>
                                            <tr>
                                                <td>{{ $dish->name }}</td>
                                                <td>{{ $dish->category->category_name }}</td>

                                                <td>{{ $dish->created_at }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('dishes.edit', $dish->id) }}"
                                                        class="btn  btn-outline-warning text-dark m-2"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger text-dark mt-2"><i
                                                                class="fas fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        </tbody>
                                    @endforeach

                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function() {
        $('#dish').DataTable({
            "paging": true,
            "pageLength": 2,
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
