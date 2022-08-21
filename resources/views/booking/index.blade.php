@extends('layouts.app')
@section('content')
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- /app-Header -->
  @include('includes.header')
            <!--APP-SIDEBAR-->
             @include('includes.sidebar')

  <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Booking Details</h1>

                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Bookings</a></li>

                                </ol>
                            </div>

                        </div>
                           @include('flash::message')
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="table-responsive">

                                            <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                                <thead>
                                                    <tr>
                                                <th class="wd-15p border-bottom-0">Fullname</th>
                                                <th class="wd-15p border-bottom-0">Email</th>
                                                <th class="wd-15p border-bottom-0">Mobile</th>


                                                         <th class="wd-15p border-bottom-0">Speciality</th>
                                                         <th class="wd-15p border-bottom-0">Appointment Date</th>

                                                            <th class="wd-15p border-bottom-0">Status</th>


                                                              <th class="wd-15p border-bottom-0">Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bookings as $value)

                                                 @php
                                                $speciality=App\Models\Speciality::where('id',$value->speciality)->first();
                                                @endphp


                                                <tr>

                                                    <td>{{ $value->fullname }}</td>
                                                       <td>{{ $value->mobile }}</td>

                                                     <td>{{ $value->email }}</td>
                                                     <td>{{ $speciality->name }}</td>

                                                             <td>{{ $value->appointment_date }}</td>
                                                             @if($value->status=='approved' )
                                                             <td style="color:green">{{ $value->status }}</td>
@else
<td >{{ $value->status }}</td>
@endif
<td style="display: flex;">
    <form id="delete-frm" class="" action="{{ route('booking.destroy',$value->id)}}" method="POST">
        {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <button style="background: none; border:none;"><i class="fa fa-trash-o" style="color: #f05050"></i></button>

 </form>
&nbsp; &nbsp;&nbsp; &nbsp;
<form id="delete-frm" class=""
    action="{{ route('approve.booking',$value->id) }}"
    method="POST">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="hidden" value="approved" name="status"/>
    <button style="background: none; border:none;"><i
            class="fa fa-check-circle"
            style="color:green"></i></button>

</form>

     </td>
                                                    </tr>


                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- CONTAINER CLOSED -->

                </div>
            </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->

        <!-- FOOTER -->
      @include('includes.footer')
        <!-- FOOTER END -->
<script src="{{asset('/')}}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    </div>
@endsection
