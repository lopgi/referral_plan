<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\User;
class PurchaseController extends Controller
{
   
    public function purchase(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $purchase = Purchase::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'purchase_date' => now(),
        ]);

        $this->distributeIncome($purchase);

        return redirect()->route('referral.dashboard')->with('success', 'Purchase successful and commission distributed.');
    }

    private function distributeIncome(Purchase $purchase)
    {
        $user = $purchase->user;
        $amount = $purchase->amount;

        if ($user->referred_by) {
            $referrer = User::find($user->referred_by);
            $referrer->commissions()->create([
                'purchase_id' => $purchase->id, 

                'amount' => $amount * 0.10,
                'is_referral' => true,
            ]);
        }

        $this->distributeLevelCommissions($user, $amount, $purchase->id);

    }

    private function distributeLevelCommissions($user, $amount, $purchaseId)
{
    $current = $user;
    $percentages = [0.05, 0.04, 0.03, 0.02, 0.01];
    $level = 1;

    while ($current->referred_by && $level <= 5) {
        $current = User::find($current->referred_by);
        $commissionAmount = $amount * $percentages[$level - 1];

        $current->commissions()->create([
            'purchase_id' => $purchaseId, 
            'amount' => $commissionAmount,
            'is_referral' => false,
            'level' => $level,
        ]);

        $level++;
    }
}

}
