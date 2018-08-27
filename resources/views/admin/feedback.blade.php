@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Feedback</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i>Customer Feedback
                    <div class="pull-right">
                        <a href="{{route('admin.print-feedback')}}" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Download Report</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Message</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($feedbacks->count() == 0)
                            <tr class="text-center">
                                <td colspan="10">No Feedback available</td>
                            </tr>
                        @else
                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <td>{{$feedback->id}}</td>
                                    <td>{{$feedback->feed_type ==1 ? 'Comment' : 'Suggestion'}}</td>
                                    <td>{{$feedback->message}}</td>
                                    <td>{{$feedback->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
@endsection