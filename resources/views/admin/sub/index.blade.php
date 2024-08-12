@extends('admin.layouts.admin')
@section('content')
    <div>
        <x-page-header :value="__('Sub Menu')" />
        @livewire('sub-table-data')
    </div>
@endsection
