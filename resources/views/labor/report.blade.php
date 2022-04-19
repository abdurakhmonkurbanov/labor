@extends('labor.main')
@section('menu')
    @include('labor.layouts.menu')
@endsection

@section('main')
    @if (isset($r_id))
        @include('labor.layouts.report_show')

    @else
        @include('labor.layouts.report_table')
    @endif

@endsection

@section('footer')
    @include('labor.layouts.footer')
@endsection
