@extends('layouts.master')
@section('title', 'Order Page')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Panel</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Order Table</h3>
                            </div>
                            <div class="card-body">

                                <table id="dish" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Dish Name</th>
                                            <th>Table Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order as $item)
                                        <tbody>
                                            <tr>
                                                <td>{{ $item->dish->name }}</td>
                                                <td>{{ $item->table_id }}</td>
                                                <td>{{ $status[$item->status] }}</td>
                                                <td>
                                                    <a href="{{ route('order.approve', $item->id) }}"
                                                        class="btn btn-warning">Approve</a>
                                                    <a href="{{ route('order.cancel', $item->id) }}"
                                                        class="btn btn-danger">Cancel</a>
                                                    <a href="{{ route('order.ready', $item->id) }}"
                                                        class="btn btn-success">Ready</a>
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
            "searching":false,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
