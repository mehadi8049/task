@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="">
                        <div class="col-md-12 mb-3">
                            <select id="year" class="form-select">
                                <option value="">Select Year</option>
                                @foreach($years as $year)
                                  <option value="{{ $year }}">{{ en2bn($year) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3 text-center">
                            <p id="fee"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("script")
    <script>
        let code="{{ auth()->user()->user_id }}";
    </script>
@endpush
