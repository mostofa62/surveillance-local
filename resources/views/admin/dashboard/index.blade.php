@extends('layouts/master')
@section('content')

    @if(session('project_id')==1)
        @include(session('access').'dashboard.project_id_1')
    @endif
    @if(session('project_id')==2)
        @include(session('access').'dashboard.project_id_2')
    @endif
    @if(session('project_id')==3)
        @include(session('access').'dashboard.project_id_3')
    @endif
@stop