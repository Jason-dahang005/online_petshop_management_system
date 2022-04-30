<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\CarbonImmutable;
use DB;
use Illuminate\Support\Carbon;
use App\Models\Transaction;

class Sales extends Component
{

    public $total, $daily, $monthly, $ifWeekly, $annually;

    public function render()
    {
        $en = CarbonImmutable::now()->locale('en_US');
        $weekly = Order::whereBetween('created_at', [$en->startOfWeek(Carbon::MONDAY), $en->endOfWeek(Carbon::SUNDAY)])->sum('total');
        
        $transaction = Transaction::all();
        $sales = Order::join('transactions', 'orders.id', '=', 'transaction.orders_id')
                    ->select('orders.*', 'transaction.*')
                    ->where('transactions.status', 'completed')
                    ->sum('orders.total');

        $daily = Order::whereDate('created_at', Carbon::today())->sum('total');

        $ws = Order::join('transaction', 'orders.id', '=', 'transactions.id')
                    ->select([
                        DB::raw('count(orders.id) as quantity'),
                        DB::raw('sum(orders.total) as total'),
                        DB::raw('week(orders.created_at) as week'),
                        DB::raw('year(orders.created_at) as year'),
                    ])
                    ->where('transactions.status', 'completed')
                    ->groupBy(['year', 'week'])
                    ->get();
        return view('livewire.admin.sales', ['transaction'=>$transaction, 'weeky'=>$weekly, 'daily'=>$daily, 'ws'=>$ws])->layout('layouts.admin', ['title'=>'Sales']);
    }
}
