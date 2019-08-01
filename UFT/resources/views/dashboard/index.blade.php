@extends('layouts.app')
@auth
    @section('content')
        <section class="content-header">
            <h1 class="pull-left">Dashboard</h1>
            <h1 class="pull-right">

            </h1>
        </section>

        <div class="content">

            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                        <div class="row">
                                <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                    <h3>{{$amount}}</h3>

                                    <p>Finance</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-cash"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                    <p>Bounce Rate</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                    <h3>65</h3>

                                    <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                                <!-- ./col -->
                            </div>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    @endsection
@endauth
