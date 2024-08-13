@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Page')" class="p-4" />

        @livewire('page-edit', [
            'id' => $id
        ])

    </div>
@endsection
