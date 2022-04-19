@extends('labor.main')
@section('menu')
    @include('labor.layouts.menu')
@endsection

@section('main')
    @if (isset($c_id))
        @include('labor.layouts.result_print')
    @else
        @include('labor.layouts.result_print_table')
    @endif

@endsection

@section('footer')
    @include('labor.layouts.footer')
@endsection
