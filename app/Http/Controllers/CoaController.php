<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\AccountLevel1;
use App\Models\AccountLevel2;
use App\Models\AccountLevel3;
use App\Models\AccountLevel4;

class CoaController extends Controller
{
    public function index()
    {
        $data = [
            'account' => AccountLevel1::with('level2.level3.level4')->get(),

            'level_1' => AccountLevel1::get(),

            'level_2' => AccountLevel2::get(),

            'level_3' => AccountLevel3::get(),
        ];

        return view('coa.index', $data);
    }

    public function get_account_level_1()
    {
        $level_1 = AccountLevel1::all();
        if ($level_1) {
            return response()->json(['success' => true, 'level_1' => $level_1]);
        } else {
            return response()->json(['error' => 'No record found']);
        }
    }

    public function get_account_level_2()
    {
        $level_2 = AccountLevel1::with('level2')->get();;
        if ($level_2) {
            return response()->json(['success' => true, 'level1' => $level_2]);
        } else {
            return response()->json(['error' => 'No record Found']);
        }
    }

    public function get_account_level_3()
    {
        $level_3 = AccountLevel1::with('level2.level3')->get();

        if ($level_3) {
            return response()->json(['success' => true, 'level1' => $level_3]);
        } else {
            return response()->json(['error' => 'No record Found']);
        }
    }


    public function get_new_code(Request $request)
    {
        $this->validate($request, [

            'account' => 'required',
            'level' => 'required'
        ]);

        if ($request->level == 'level_2') {
            $level1 = AccountLevel1::where('id', $request->account)->first();

            if (!$level1) {
                return response()->json(['error' => true, 'message' => 'Account Not Found']);
            }
            $count = AccountLevel2::where('parent_id', $level1->id)->count();

            $code = $level1->start_code + $count;
            return response()->json(['success' => true, 'code' => $code]);
        } elseif ($request->level == 'level_3') {
            $level2 = AccountLevel2::where('id', $request->account)->first();

            if (!$level2) {
                return response()->json(['error' => true, 'message' => 'Account Not Found']);
            }

            $count = AccountLevel3::where('parent_id', $level2->id)->count();

            $count = $count + 1;

            $code = $level2->code . '-' . $count;

            return response()->json(['success' => true, 'code' => $code]);
        } elseif ($request->level == 'level_4') {
            // return response()->json($request->all());
            $level3 = AccountLevel3::where('id', $request->account)->first();

            if (!$level3) {
                return response()->json(['error' => true, 'message' => 'Account Not Found']);
            }

            $count = AccountLevel4::where('parent_id', $level3->id)->count();
            $count = $count + 1;
            $code = $level3->code . '-' . $count;

            return response()->json(['success' => true, 'code' => $code]);
        } else {
            return response()->json(['error' => true, 'message' => 'Level Not Found']);
        }
    }



    public function create_account(Request $request)
    {
        if ($request->level == 'level_1') {
            $acc_data = [
                'name' => $request->account_name,
                'status' => 1,
                'start_code' => $request->start_code,
                'end_code' => $request->end_code,
            ];

            $account_exist = AccountLevel1::where('name', $request->account_name)->first();

            if ($account_exist) {
                return response()->json(['error' => 'Account with this name already exist']);
            }

            $account_created = AccountLevel1::create($acc_data);

            if (1 == 1) {
                return response()->json(['success' => 'Account has been created']);
                return response()->json('ok');
            } else {
                return response()->json(['error' => 'Account has failed to create']);
            }
        } elseif ($request->level == 'level_2') {
            // return response()->json($request->all());
            $level_2_data = [
                'code' => $request->code,
                'parent_id' => $request->account_level_1,
                'name' => $request->name_level_2,
                'status' => 1,
            ];

            $account_exist = AccountLevel2::where([
                'name' => $request->name_level_2,
                'parent_id' => $request->account_level_1
            ])->first();

            if ($account_exist) {
                return response()->json(['error' => 'Account with this name already exist']);
            }

            $level_2_created = AccountLevel2::create($level_2_data);

            if ($level_2_created) {
                return response()->json(['success' => 'Account has been created']);
            } else {
                return response()->json(['error' => 'Account has failed to create']);
            }
        } elseif ($request->level == 'level_3') {
            // return response()->json($request->all());
            $level_3_data = [
                'code' => $request->code,
                'parent_id' => $request->account_level_2,
                'name' => $request->name_level_3,
                'status' => 1,
            ];

            // return response()->json($level_3_data);
            $account_exist = AccountLevel3::where([
                'name' => $request->name_level_3,
                'parent_id' => $request->account_level_2
            ])->first();

            if ($account_exist) {
                return response()->json(['error' => 'Account with this name already exist']);
            }

            $level_3_created = AccountLevel3::create($level_3_data);

            if ($level_3_created) {
                return response()->json(['success' => 'Account has been created']);
            } else {
                return response()->json(['error' => 'Account has failed to create']);
            }
        } else{
            // return response()->json($request->all());
            $level_4_data = [
                'code' => $request->code,
                'parent_id' => $request->account_level_3,
                'name' => $request->name_level_4,
                'opening_balance' => $request->opening_balance,
                'status' => 1,
            ];

            $account_exist = AccountLevel4::where([
                'name' => $request->name_level_4,
                'parent_id' => $request->account_level_3
            ])->first();

            if ($account_exist) {
                return response()->json(['error' => 'Account with this name already exist']);
            }

            $account = AccountLevel4::create($level_4_data);

            if ($account) {
                if ($request->transaction_type == 'credit' || $request->transaction_type == 'debit') {
                    $type = $request->transaction_type;
                }

                if (isset($request->opening_balance)) {
                    $data = [
                        'date' => date('Y-m-d'),
                        'amount' => $request->opening_balance,
                        'acc_level_1' => $account->level3->level2->level1->id,
                        'acc_level_2' => $account->level3->level2->id,
                        'acc_level_3' => $account->level3->id,
                        'acc_level_4' => $account->id,
                        'status' => 'Opening Balance',
                        'description' => 'Opening Balance',
                        'type' => $type,
                    ];
                    $transaction = Transaction::create($data);
                    if($transaction){
                        AccountLevel4::where('id', $account->id)->update(['balance' => $account->balance + $request->opening_balance, 'opening_balance_id' => $transaction->id]);
                        return response()->json(['success' => 'Account has been created']);

                    } else{
                        return response()->json(['error' => 'Account has failed to create']);
                    }
                }
            } else {
                return response()->json(['error' => 'Account has failed to create']);
            }
        }
    }
}
