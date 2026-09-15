@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="class-admin-page-header">
        <div class="class-admin-page-title-row">
            <span class="class-admin-page-icon"><x-admin-icon name="dashboard" /></span>
            <div>
                <h1 class="class-admin-page-title">Dashboard</h1>
                <p class="class-admin-page-subtitle">Resumen general de tu catálogo</p>
            </div>
        </div>
    </div>

    <div class="class-admin-empty">
        <x-admin-icon name="dashboard" />
        <p>Todavía no hay nada configurado aquí.</p>
    </div>

@endsection
