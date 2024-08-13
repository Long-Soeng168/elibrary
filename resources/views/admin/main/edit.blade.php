@extends('admin.layouts.admin')

@section('content')
    <div class="p-4">
        <x-form-header :value="__('Edit Main Menu')" class="p-4" />

        @livewire('main-edit', [
            'item' => $item,
        ])

    </div>
@endsection
