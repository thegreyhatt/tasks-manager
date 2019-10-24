@extends('sbadmin2::page')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Print</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						{!! Form::open(['method' => 'GET']) !!}
                        <div class="input-group mb-3">
                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                            
                            {!! Form::hidden('start_date', null, ['id' => 'start_date']) !!}
                            {!! Form::hidden('end_date', null, ['id' => 'end_date']) !!}

                            <div class="input-group-append">
                                {!! Form::submit('Go!', ['class' => 'btn btn-primary']) !!}
                            </div>

                          </div>
                        {!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-borderless table-hover table-condensed">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Requested By</th>
									<th>Date Requested</th>
									<th>As of</th>
									<th>Status</th>
									<th>Verified by</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($tasks as $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->requested_by }}</td>
									<td>{{ date('M d, Y', strtotime($item->date_requested)) }}</td>
									<td>{{ date('M d, Y', strtotime($item->as_of)) }}</td>
									<td>{{ $item->status }}</td>
									<td>{{ $item->verified_by }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
@endpush

@push('js')
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.js') }}" ></script>
    <script type="text/javascript">
    $(function() {

        // var start = moment().subtract(29, 'days');
        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#start_date').val(start.format('YYYY-M-D'));
            $('#end_date').val(end.format('YYYY-M-D'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
        }, cb);

        cb(start, end);

    });
    </script>
@endpush