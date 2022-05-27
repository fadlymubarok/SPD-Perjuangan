@extends('admin.layouts.master')

@section('header')
@include('admin.layouts.partials.topbar')
@endsection

@section('breadcrumbs')
@include('admin.layouts.partials.breadcumbs')
@endsection

@section('content')
<div class="col-lg-4">
    <div class="card text-center py-2">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-folder text-info border-info"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text ml-2">Berita desa</div>
                    <div class="stat-digit ml-2">{{ $berita_desa }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card text-center py-2">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-wallet text-success border-success"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text ml-2">Keuangan desa</div>
                    <div class="stat-digit ml-2">{{ $keuangan_desa }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="card text-center py-2">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-agenda text-danger border-danger"></i></div>
                <div class="stat-content dib">
                    <div class="stat-text ml-2">Events</div>
                    <div class="stat-digit ml-2">{{ $event }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col d-flex justify-content-center">
    <div class="col-lg-4">
        <div class="card text-center py-2">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-cup text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text ml-2">Prestasi</div>
                        <div class="stat-digit ml-2">{{ $prestasi }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card text-center py-2">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-help text-info border-info"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text ml-2">Pertanyaan</div>
                        <div class="stat-digit ml-2">{{ $pertanyaan }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection