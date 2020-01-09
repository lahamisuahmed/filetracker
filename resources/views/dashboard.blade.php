@extends('layouts.layout')

@section('content')
    <section class="content">

     <!-- Info boxes -->
      <div class="row">
            <div class="box-header with-border">
              <h3 class="box-title">System Total Recap Reports</h3>
            </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="{{route('files.index')}}">Total Files</a></span>
              <span class="info-box-number">{{\App\File::All()->count()}}<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-hourglass-1"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Available Files</span>
              <span class="info-box-number">{{\App\File::Where('status', 'available')->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-hourglass-end"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="{{route('histories.index')}}">Issued Files</a> </span>
              <span class="info-box-number">{{\App\File::Where('status', 'not_available')->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
            <span class="info-box-text"><a href="{{route('duefiles')}}"> Due Files</a></span>
              <span class="info-box-number">{{\App\History::where('status','!=','returned')->whereDate('returned_date', '<=', \Carbon\Carbon::now() )->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Weekly Recap Report</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      {{-- <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong> --}}
                    </p>
  
                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <div id="chartdiv"></div>
                      <canvas id="salesChart" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>File Statistics</strong>
                    </p>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
            
                        <div class="info-box-content">
                          <span class="info-box-text">Total </span>
                          <span class="info-box-number">92,050</span>
            
                          <div class="progress">
                            <div class="progress-bar" style="width: 20%"></div>
                          </div>
                          <span class="progress-description">
                                {{-- 20% Increase in 30 Days --}}
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
            
                        <div class="info-box-content">
                          <span class="info-box-text">Issued</span>
                          <span class="info-box-number">114,381</span>
            
                          <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                          </div>
                          <span class="progress-description">
                                {{-- 70% Increase in 30 Days --}}
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                      <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
            
                        <div class="info-box-content">
                          <span class="info-box-text">Over Due</span>
                          <span class="info-box-number">163,921</span>
            
                          <div class="progress">
                            <div class="progress-bar" style="width: 40%"></div>
                          </div>
                          <span class="progress-description">
                                40% Increase in 30 Days
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./box-body -->
              {{-- <div class="box-footer">
                <div class="row">
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-xs-6">
                    <div class="description-block">
                      <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">GOAL COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div> --}}
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      {{-- <div class="row">
        	<section class="content-header">
              <h1>Number of Files Issued by Days</h1>
              </section>
          <div class="col-md-8 col-sm-12 col-xs-12">

            <div id="chartdiv"></div>
          </div>
      </div> --}}
    </section>
@endsection
@section('script')
<script>
 
  </script>
@endsection