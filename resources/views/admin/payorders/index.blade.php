@extends('admin.layouts.include')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php $user = Auth::user(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recieved Payorders</h3>
                            <a href="{{route('payorder.create')}}" style="margin-left: 30px;"  class="btn btn-primary btn-sm float-right">Add New Payorder </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Personal #</th>
                                    <th>Employee CNIC</th>
                                    <th>Beneficiary Name</th>
                                    <th>Fund</th>
                                    <th>Bank</th>
                                    <th>Payorder #</th>
                                    <th>Dated</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payorders as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->personalnumber}}</td>
                                            <td>{{$row->employeecnic}}</td>
                                            <td>{{$row->employeename}}</td>
                                            <td>
                                                @if($row->fund == '01')
                                                Group Insurance
                                                @elseif($row->fund == '02')
                                                Benevolent Fund
                                                @endif
                                            </td>
                                            <td>{{$row->bank->name}}</td>
                                            <td>{{$row->po_number}}</td>
                                            <td >{{$row->podate}}  </td >
                                            <td >{{number_format($row->amount)}} </td >
                                            <td width="12%">
                                                <!-- edit section -->
                                                <a href="{{route('payorder.edit' ,$row->id)}}"
                                                   class="btn btn-xs btn-primary"
                                                   title="edit">
                                                    <i class="fa fa-pen"></i> Edit
                                                </a>
                                                <!-- view section -->
                                                <a href="{{route('payorder.show' ,$row->id)}}"
                                                   class="btn btn-xs btn-primary"
                                                   title="edit">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <!-- Delete section -->
                                                <a href="{{route('payorder.destroy' ,$row->id)}}" id="delete"
                                                   class="btn btn-xs btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <!-- End of delete -->
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
