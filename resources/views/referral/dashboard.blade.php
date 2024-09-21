<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ Auth::user()->name ?? 'N/A' }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Success message -->
                @if(session('success'))
                    <div class="alert alert-success w-100">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Referral Code Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Your Referral Code</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Referral Code:</strong> {{ Auth::user()->referral_code ?? 'N/A' }}</p>
                            <p>Share this code with your friends!</p>
                        </div>
                    </div>
                </div>

                <!-- Total Commission Card -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Commission</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Total Commission:{{$totalCommission}}</strong> </p>
                        </div>
                    </div>
                </div>

                <!-- Purchase Form -->
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Make a Purchase</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('purchase')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Purchase Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required>
                                </div>
                                <button type="submit" class="btn btn-success">Complete Purchase</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Referral Commissions Table -->
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Referral Commissions</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Purchase Amount</th>
                                        <th>Commission Amount</th>
                                        <th>Distribution Month</th>
                                        <th>Referred To</th>
                                        <th>Level</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through referral commissions -->
                                    @forelse($referralCommissions as $commission)
                        <tr>
                            <td>{{ $commission->purchase->amount ?? 'N/A' }}</td>
                            <td>{{ number_format($commission->amount, 2) }}</td>
                            <td>
                                <!-- Calculate the distribution month dynamically -->
                                @php
                                    $purchaseDate = $commission->purchase->created_at;
                                    $distributionMonth = \Carbon\Carbon::parse($purchaseDate)->addMonth()->format('F Y');
                                @endphp
                                {{ $distributionMonth }}
                            </td>
                            <td>{{ $commission->purchase->user->name ?? 'N/A' }}</td> <!-- Display the name of the referred user -->
                            <td>{{ $commission->level ?? 'Referral' }}</td>
                            <td>{{ $commission->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No commissions found</td>
                        </tr>
                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- End row -->
        </div> <!-- End container-fluid -->
    </section>
</div>
@endsection
