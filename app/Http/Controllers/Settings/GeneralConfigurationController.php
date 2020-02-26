<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\References\AccountTitle;
use App\Models\Settings\GeneralConfiguration;
use App\Http\Resources\Reference;

class GeneralConfigurationController extends Controller
{

    public function index()
    {
        $accounts['current'] =GeneralConfiguration::where('integration_id',1)->get()[0];
        $accounts['accounttitles'] = AccountTitle::select(
            'account_id',
            'account_title',
            )
            ->where('is_active',TRUE)
            ->where('is_deleted',FALSE)
            ->orderBy('account_title','asc')->get();

        return Reference::collection($accounts)
        ->response()
        ->setStatusCode(200);
    }

    public function customers(request $request)
    {
        $genconf=GeneralConfiguration::findOrFail(1);
        $genconf->output_tax_account_id = $request->input('output_tax_account_id');
        $genconf->receivable_account_id = $request->input('receivable_account_id');
        $genconf->receivable_discount_account_id = $request->input('receivable_discount_account_id');
        $genconf->payment_from_customer_id = $request->input('payment_from_customer_id');
        $genconf->save();
        return ( new Reference( $genconf ))
                ->response()
                ->setStatusCode(201);
    }

    public function suppliers(request $request)
    {
        $genconf=GeneralConfiguration::findOrFail(1);
        $genconf->input_tax_account_id = $request->input('input_tax_account_id');
        $genconf->payable_account_id = $request->input('payable_account_id');
        $genconf->payable_discount_account_id = $request->input('payable_discount_account_id');
        $genconf->payment_to_supplier_id = $request->input('payment_to_supplier_id');
        $genconf->supplier_wtax_account_id = $request->input('supplier_wtax_account_id');
        $genconf->save();
        return ( new Reference( $genconf ))
                ->response()
                ->setStatusCode(201);
    }

    public function others(request $request)
    {
        $genconf=GeneralConfiguration::findOrFail(1);
        $genconf->retained_earnings_id = $request->input('retained_earnings_id');
        $genconf->petty_cash_account_id = $request->input('petty_cash_account_id');
        $genconf->depreciation_expense_debit_id = $request->input('depreciation_expense_debit_id');
        $genconf->fixed_asset_account_id = $request->input('fixed_asset_account_id');
        $genconf->depreciation_expense_credit_id = $request->input('depreciation_expense_credit_id');
        $genconf->save();
        return ( new Reference( $genconf ))
                ->response()
                ->setStatusCode(201);
    }

    public function inventory(request $request)
    {
        $genconf=GeneralConfiguration::findOrFail(1);
        $genconf->sales_invoice_inventory = (int)$request->input('sales_invoice_inventory');
        $genconf->cash_invoice_inventory = (int)$request->input('cash_invoice_inventory');
        $genconf->dispatching_invoice_inventory = (int)$request->input('dispatching_invoice_inventory');
        $genconf->save();
        return ( new Reference( $genconf ))
                ->response()
                ->setStatusCode(201);
    }

}
