@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="w-3/12">
        <app-nav/>
    </div>

    <div class="w-7/1 border border-gray-800 border-t-0 border-b-0 ">
        <app-profile />
    </div>
</div>
@endsection