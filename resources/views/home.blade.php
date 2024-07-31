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
                    @if(auth()->user()->role=='user')
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
                    @else
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="row mb3">
                            <div class="col">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="code_id" class="label-control">Code <span class="text-danger">*</span></label>
                                <select id="code_id" name="code_id" class="form-select">
                                    <option value="">Select Code</option>
                                    @foreach(\App\Models\Code::all() as $code)
                                        <option value="{{ $code->id }}" {{ old('code_id')==$code->id?'selected':''}}>{{ en2bn($code->code) }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('code_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col">
                                <label for="from_year" class="label-control">From Year <span class="text-danger">*</span></label>
                                <input type="text" id="from_year" value="{{ old('from_year') }}" name="from_year" class="form-control" placeholder="From Year">
                                {!! $errors->first('from_year', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col">
                                <label for="to_year" class="label-control">To Year <span class="text-danger">*</span></label>
                                <input type="text" id="to_year" name="to_year" value="{{ old('to_year') }}" class="form-control" placeholder="To Year">
                                {!! $errors->first('to_year', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="row mb-3">
                            
                            <div class="col">
                                <label for="amount" class="label-control">Renewal Fee (Amount) <span class="text-danger">*</span></label>
                                <input type="text" id="amount" name="amount" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
                                {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col">
                                <label for="formula" class="label-control">Formula <span class="text-danger">*</span></label>
                                <input type="text" id="formula" name="formula" value="{{ old('formula') }}" class="form-control" placeholder="Formula">
                                {!! $errors->first('formula', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    @endif
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
