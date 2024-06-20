<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use App\Models\Mutation;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index($id) 
    {
        $account = Account::find($id);

        return view("transfer",  compact('account'));
    }


    public function store(Request $request, $id)
    {
        $account = Account::find($id);

        $username = $account->username;
        $balanceInfo = Balance::where('username', $username)->first();

        $accountNumSender = $balanceInfo->accountNumber;
        $accountNumReceiver = $request->account;
        $amount = $request->amount;

        // Mengecek apakah saldo cukup
        if ($balanceInfo->balance < $amount) {
            return redirect()->route('transfer', ['id' => $id])->with('error', 'Saldo tidak mencukupi');
        }

        // Mencari info balance dari penerima
        $receiver = Balance::where('accountNumber', $accountNumReceiver)->first();

        // Bila no rekening tidak ditemukan
        if (!$receiver){
            return redirect()->route('transfer', ['id' => $id])->with('error', 'Nomor rekening tidak ditemukan');
        }

        // Mencari account dari penerima
        $receiverAccount = Account::where('username', $receiver->username)->first();

        // Fullname dari penerima
        $receiverName = $receiverAccount->fullname;

        // Update balance
        $balanceInfo->balance -= $amount;
        $balanceInfo->save();

        $receiver->balance += $amount;
        $receiver->save();

        $news = $request->description;

        // Riwayat transaksi untuk pengirim
        $senderMutation = new Mutation;
        $senderMutation->accountMutated = $accountNumSender;
        $senderMutation->date = now();
        $senderMutation->account = $accountNumReceiver;
        $senderMutation->amount = $amount;
        $senderMutation->type = 'uang keluar';
        $senderMutation->news = 'Transfer ke rekening ' . $accountNumReceiver .' '. $receiverName .':'. $news;
        $senderMutation->save();

        // Riwayat transaksi untuk penerima
        $receiverMutation = new Mutation;
        $receiverMutation->accountMutated = $accountNumReceiver;
        $receiverMutation->date = now();
        $receiverMutation->account = $accountNumSender;
        $receiverMutation->amount = $amount;
        $receiverMutation->type = 'uang masuk';
        $receiverMutation->news = 'Transfer dari rekening ' . $accountNumSender .' '. $account->fullname.':'. $news;
        $receiverMutation->save();

        return redirect()->route('transfer', ['id' => $id])->with('status', 'Transfer berhasil');
    }
}