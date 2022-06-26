@extends('voyager::master')

@section('page_title', 'Activity Log' )

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-activity"></i> Activity Log
        </h1>
    </div>
@stop

@section('css')

@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Activity</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            var dataTableParams = {!! json_encode(
                    array_merge([
                        "language" => __('voyager::datatable'),
                        "processing" => true,
                        "serverSide" => true,
                        "ordering" => true,
                        "searching" => true,
                        "stateSave"=> false,
                        "ajax" => [
                            "method" => "POST",
                            "url" => route("activities.datatable"),
                        ],
                        "columns" => [
                            [ "data" => 'id', "visible" => false],
                            [ "data" => 'description'],
                        ]
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!};
            let table = $('#dataTable').DataTable(dataTableParams);

            $(document).on("keydown", "form", function(event) {
                return event.key != "Enter";
            });

        });
    </script>
@stop
