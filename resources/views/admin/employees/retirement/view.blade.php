@extends('admin.layouts.include')

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('parsley/parsley.css')}}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php $user = Auth::user(); ?>
                        <table class="table table-bordered  border-dark center">

                            <tbody>
                                    @foreach($employee as $row)
                                        @foreach($row->legals as $row1)
                                            @foreach($row->documents as $row2)
                                    <tr>
                                        <th scope="row">Personal Number :</th> <td>{{$row->pno}} </td>
                                         <th scope="row">Employee CNIC :</th> <td>{{$row->employeecnic}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Employee Name :</th>  <td>{{$row->employeename}}</td>
                                        <th scope="row">Father name :</th>   <td>{{$row->fathername}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Date of Birth :</th>   <td>{{$row->dateofbirth}}</td>
                                        <th scope="row">Department :</th>       <td>{{$row->department->department_desc}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Designation :</th>  <td>{{$row->designation->designation_desc}}</td>
                                        <th scope="row">Claim Type :</th>  <td>{{$row->gitype}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Retirment Date :</th>  <td>{{$row->retirementdate}}</td>
                                        <th scope="row">Grade :</th>           <td>{{$row->grade}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact no :</th>    <td>{{$row->contactno}}</td>
                                        <th scope="row">Bank :</th>         <td>{{$row1->bank->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Branch :</th>            <td>{{$row1->branch->branch_desc}}</td>
                                        <th scope="row">Account Number :</th>   <td>{{$row1->accountno}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Amount :</th>    <td>{{$row1->amount}}</td>
                                    </tr>

                                        @endforeach
                                    @endforeach

                            </tbody>
                        </table>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Attachment of this Claim</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-2">
                                <a href="{{asset($row2->employee_cnic_img)}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="{{asset($row2->employee_cnic_img)}}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{asset($row2->employee_pension_sheet_img)}}" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                                    <img src="{{asset($row2->employee_pension_sheet_img)}}" class="img-fluid mb-2" alt="black sample"/>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{asset($row2->part3form_b)}}" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                                    <img src="{{asset($row2->part3form_b)}}" class="img-fluid mb-2" alt="red sample"/>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{asset($row2->stamp_paper)}}" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                                    <img src="{{asset($row2->stamp_paper)}}" class="img-fluid mb-2" alt="red sample"/>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{asset($row2->retirement_order)}}" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                                    <img src="{{asset($row2->retirement_order)}}" class="img-fluid mb-2" alt="black sample"/>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{asset($row2->contribution_statement)}}" data-toggle="lightbox" data-title="sample 6 - white" data-gallery="gallery">
                                    <img src="{{asset($row2->contribution_statement)}}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        });
    </script>
@endsection
