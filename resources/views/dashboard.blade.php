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
<br />

                        <!-- ROW OPEN -->
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0">
                                        <div class="float-start">
                                            <p class="mb-1">Total Bookings</p>
                                            <h2 class="counter mb-0">{{ App\Models\Booking::All()->count()}}</h2>
                                        </div>
                                        <div class="float-end">
                                            <span class="mini-stat-icon bg-info"><i class="fa fa-users"></i></span>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- ROW CLOSED -->


                        <!-- ROW-4 -->
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title mb-0">Bookings</h3>
                                    </div>
                                    <div class="card-body pt-4">
                                        <div class="grid-margin">
                                            <div class="">
                                                <div class="panel panel-primary">
                                                    <div class="tab-menu-heading border-0 p-0">
                                                        <div class="tabs-menu1">
                                                            <!-- Tabs -->
                                                            <ul class="nav panel-tabs product-sale">


                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body tabs-menu-body border-0 pt-0">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab5">
                                                               <div class="table-responsive">
                                             <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                                        <thead class="border-top">
                                                    <tr>

                                                          <th class="bg-transparent border-bottom-0">FULL NAME </th>
                                               <th class="bg-transparent border-bottom-0">MOBILE </th>
                                                <th class="bg-transparent border-bottom-0">EMAIL </th>
                                                        <th class="bg-transparent border-bottom-0">SPECIALITY </th>
                                                         <th class="bg-transparent border-bottom-0">APPOINTMENT DATE</th>
                                                         <th class="bg-transparent border-bottom-0">STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $bookings=App\Models\Booking::All();
                                                    @endphp
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

                                                                 <td>{{ $value->status }}</td>




                                                            </div>
                                                                                     </tr>


                                                    @endforeach

                                        </div>




                                           </tbody>
                                            </table>
                                                                </div>
                                                            </div>





                                           </tbody>
                                            </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-4 END -->

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>




        <!-- FOOTER -->
      @include('includes.footer')
        <!-- FOOTER END -->
   <script src="../assets/js/jquery.min.js"></script>




    <!-- INTERNAL Data tables js-->
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>


    </div>
@endsection
