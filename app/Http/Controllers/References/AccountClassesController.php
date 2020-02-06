<?php

namespace App\Http\Controllers\References;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\References\AccountClass;
use App\Http\Resources\Reference;

class AccountClassesController extends Controller
{

    public function index()
    {
        $accountclasses = AccountClass::select(
            'account_classes.account_class_id',
            'account_classes.account_class',
            'account_classes.description',
            'account_classes.account_type_id',
            'account_types.account_type'
            )
            ->leftJoin('account_types', 'account_types.account_type_id', '=', 'account_classes.account_type_id')
            ->where('account_classes.is_active',TRUE)
            ->where('account_classes.is_deleted',FALSE)
            ;
        return Reference::collection($accountclasses->get());
    }

}
