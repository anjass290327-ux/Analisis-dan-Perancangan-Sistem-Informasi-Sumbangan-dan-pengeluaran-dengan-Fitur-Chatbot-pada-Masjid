@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Total Donations</h3>
        <p class="text-3xl font-bold text-green-600">{{ number_format(\App\Models\Donation::sum('amount'), 2) }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Total Expenses</h3>
        <p class="text-3xl font-bold text-red-600">{{ number_format(\App\Models\Expense::sum('amount'), 2) }}</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Balance</h3>
        <p class="text-3xl font-bold text-blue-600">{{ number_format(\App\Models\Donation::sum('amount') - \App\Models\Expense::sum('amount'), 2) }}</p>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activities</h3>
    <div class="space-y-4">
        @foreach(\App\Models\Donation::latest()->take(5) as $donation)
            <div class="flex justify-between items-center border-b pb-2">
                <div>
                    <p class="font-medium">{{ $donation->description }}</p>
                    <p class="text-sm text-gray-500">{{ $donation->user->name }} - {{ $donation->date->format('d/m/Y') }}</p>
                </div>
                <span class="text-green-600 font-semibold">+{{ number_format($donation->amount, 2) }}</span>
            </div>
        @endforeach
        @foreach(\App\Models\Expense::latest()->take(5) as $expense)
            <div class="flex justify-between items-center border-b pb-2">
                <div>
                    <p class="font-medium">{{ $expense->description }}</p>
                    <p class="text-sm text-gray-500">{{ $expense->user->name }} - {{ $expense->date->format('d/m/Y') }}</p>
                </div>
                <span class="text-red-600 font-semibold">-{{ number_format($expense->amount, 2) }}</span>
            </div>
        @endforeach
    </div>
</div>
@endsection
