@extends('layouts.master')

@section('content')
<div class="wrapper">
    <div class="page">
        <div class="page-inner">
            <header class="page-title-bar">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route("home") }}">
                                <i class="breadcrumb-icon fa fa-angle-left mr-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Payrolls</li>
                    </ol>
                </nav>
                <div class="d-sm-flex align-items-sm-center">
                    <h1 class="page-title mr-sm-auto mb-0">Payrolls</h1>
                </div>
            </header>

            <div class="page-section">
                <section class="card shadow-1 border-0 card-fluid">
                    <header class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">All</a>
                            </li>
                        </ul>
                    </header>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\Payroll::get() as $payroll)
                                    <tr>
                                        <td>
                                            <a href="{{ url('showpayroll/'.$payroll->id) }}">
                                                {{ $payroll->id }} - {{ $payroll->payrollid }}
                                            </a>
                                        </td>
                                        <td>{{ $payroll->payrolldesc }}</td>
                                        <td>{{ $payroll->payclosed == 1 ? "Open" : "Closed" }}</td>
                                        <td class="align-middle text-right">       
                                            <a href="{{ route("payrolls.approves.store", $payroll) }}" class="btn btn-primary">Send approve</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection