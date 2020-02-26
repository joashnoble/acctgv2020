<template>
<div>
        <notifications group="notification" />
      <b-card border-variant="default" class="text-left card-header-primary">
        <h5 slot="header">
            <span >General Configuration
                <small>  <b-icon-question></b-icon-question></small>
            </span>
        </h5>
            <div>
            <b-tabs content-class="mt-3">
                <b-tab title="Supplier" active>
                    <b-form autocomplete="off">
                        <b-row>
                        <b-col sm="6">
                            <b-form-group>
                                <label> Input Tax Account </label>
                                <select2
                                    :allowClear="false"
                                    :placeholder="''"
                                    :value="forms.suppliers.fields.input_tax_account_id"
                                    v-model="forms.suppliers.fields.input_tax_account_id"
                                >
                                <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                </select2>
                                <small><i>Input Tax is generally apply to the purchases of goods and services.</i></small>
                            </b-form-group>
                        </b-col>
                        <b-col sm="6">
                            <b-form-group>
                                <label> Payable to Supplier  </label>
                                <select2
                                    :allowClear="false"
                                    :placeholder="''"
                                    v-model="forms.suppliers.fields.payable_account_id"
                                    :value="forms.suppliers.fields.payable_account_id"
                                >
                                <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                </select2>
                                <small><i>Account that is used to represent the amount owes by the company.</i></small>
                            </b-form-group>
                        </b-col>
                        </b-row>
                        <b-row>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Discount from Supplier  </label>
                                    <select2
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.suppliers.fields.payable_discount_account_id"
                                        :value="forms.suppliers.fields.payable_discount_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Account that is used to represent the discount from the supplier.</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Payment to Supplier </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.suppliers.fields.payment_to_supplier_id"
                                        :value="forms.suppliers.fields.payment_to_supplier_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where payment to supplier will be credited.</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <b-row>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Withholding Tax Account </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.suppliers.fields.supplier_wtax_account_id"
                                        :valuee="forms.suppliers.fields.supplier_wtax_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where supplier withholding tax payables will be credited..</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <b-row class="pull-right mt-2">
                            <b-col sm="12">
                                <b-button 
                                    :disabled="forms.suppliers.isSaving" 
                                    variant="success" 
                                    @click="onSave('suppliers')">
                                    <b-spinner v-if="forms.suppliers.isSaving" small variant="light" label="Spinning"></b-spinner>
                                    <i class="fa fa-check"></i>
                                    Save Supplier Configurations
                                </b-button>
                            </b-col>
                        </b-row>
                    </b-form>
                </b-tab>
                <!-- END OF SUPPLIER INTEGRATION -->
                <b-tab title="Customer">
                    <b-form autocomplete="off">
                         <b-row>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Output Tax Account </label>
                                    <select2
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.customers.fields.output_tax_account_id"
                                        :value="forms.customers.fields.output_tax_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Output tax is the amount charge on your own sales if you are registered as Vatted.</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Receivable from Customer  </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.customers.fields.receivable_account_id"
                                        :value="forms.customers.fields.receivable_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Account that represents the amount of goods and services credited by customer.</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                         <b-row>
                            <b-col sm="6">
                                <b-form-group>
                                    <label>  Discount to Customer  </label>
                                    <select2
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.customers.fields.receivable_discount_account_id"
                                        :value="forms.customers.fields.receivable_discount_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Account that is used to represent the discount you give to customers.</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Collection Account </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.customers.fields.payment_from_customer_id"
                                        :value="forms.customers.fields.payment_from_customer_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where payment of customer will be posted.</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <b-row class="pull-right mt-2">
                            <b-col sm="12">
                                <b-button 
                                    :disabled="forms.customers.isSaving" 
                                    variant="success" 
                                    @click="onSave('customers')">
                                    <b-spinner v-if="forms.customers.isSaving" small variant="light" label="Spinning"></b-spinner>
                                    <i class="fa fa-check"></i>
                                    Save Customer Configurations
                                </b-button>
                            </b-col>
                        </b-row>
                    </b-form>
                </b-tab>
                <b-tab title="Inventory" >
                    <b-form autocomplete="off">
                        <b-row class="mb-2">
                            <b-col sm="12">
                                <span>INVENTORY COMPUTATION</span><br>
                                <i><small>Select if Sales, Cash, and Dispatching Invoices are included in the computation of inventory.</small></i>
                            </b-col>
                            
                        </b-row>
                         <b-row>
                            <b-col sm="4">
                                <b-form-group>
                                    <label> Sales Invoices </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.inventory.fields.sales_invoice_inventory"
                                        :value="forms.inventory.fields.sales_invoice_inventory"
                                    >
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                   </select2>
                                </b-form-group>
                            </b-col>
                            <b-col sm="4">
                                <b-form-group>
                                    <label> Cash Invoices </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.inventory.fields.cash_invoice_inventory"
                                        :value="forms.inventory.fields.cash_invoice_inventory"
                                    >
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                   </select2>
                                </b-form-group>
                            </b-col>
                            <b-col sm="4">
                                <b-form-group>
                                    <label> Dispatching Invoices </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.inventory.fields.dispatching_invoice_inventory"
                                        :value="forms.inventory.fields.dispatching_invoice_inventory"
                                    >
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                   </select2>
                                </b-form-group>
                            </b-col>
                         </b-row>
                        <b-row class="pull-right mt-2">
                            <b-col sm="12">
                                <b-button 
                                    :disabled="forms.inventory.isSaving" 
                                    variant="success" 
                                    @click="onSave('inventory')">
                                    <b-spinner v-if="forms.inventory.isSaving" small variant="light" label="Spinning"></b-spinner>
                                    <i class="fa fa-check"></i>
                                    Save Inventory Configurations
                                </b-button>
                            </b-col>
                        </b-row>
                    </b-form>
                            














                </b-tab>
                <b-tab title="Other Accounts" >
                    <b-form autocomplete="off">
                         <b-row>
                            <b-col sm="6" hidden>
                                <b-form-group>
                                    <label> Retained Earnings </label>
                                    <select2
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.others.fields.retained_earnings_id"
                                        :value="forms.others.fields.retained_earnings_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where net income will be forwarded.</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Petty Cash  </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.others.fields.petty_cash_account_id"
                                        :value="forms.others.fields.petty_cash_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where petty cash will be forwarded.</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6">
                                <b-form-group>
                                    <label> Depreciation Expense (Debit) </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.others.fields.depreciation_expense_debit_id"
                                        :value="forms.others.fields.depreciation_expense_debit_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Account that represents the Debit Entry of the Depreciation Expense.</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                         <b-row>
                            <b-col sm="6" hidden>
                                <b-form-group>
                                    <label>  Fixed Asset  </label>
                                    <select2
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.others.fields.fixed_asset_account_id"
                                        :value="forms.others.fields.fixed_asset_account_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Please select the account where the fixed asset will be forwarded..</i></small>
                                </b-form-group>
                            </b-col>
                            <b-col sm="6" offset="6">
                                <b-form-group>
                                    <label> Depreciation Expense (Credit) </label>
                                    <select2
                                        ref="brand_id"
                                        :allowClear="false"
                                        :placeholder="''"
                                        v-model="forms.others.fields.depreciation_expense_credit_id"
                                        :value="forms.others.fields.depreciation_expense_credit_id"
                                    >
                                    <option v-for="accounttitle in options.accounttitles.items" :key="accounttitle.account_id" :value="accounttitle.account_id">{{accounttitle.account_title}}</option>
                                    </select2>
                                    <small><i>Account that represents the Credit Entry of the Depreciation Expense.</i></small>
                                </b-form-group>
                            </b-col>
                        </b-row>
                        <b-row class="pull-right mt-2">
                            <b-col sm="12">
                                <b-button 
                                    :disabled="forms.others.isSaving" 
                                    variant="success" 
                                    @click="onSave('others')">
                                    <b-spinner v-if="forms.others.isSaving" small variant="light" label="Spinning"></b-spinner>
                                    <i class="fa fa-check"></i>
                                    Save Customer Configurations
                                </b-button>
                            </b-col>
                        </b-row>
                    </b-form>
                </b-tab>
                <b-tab title="Accounting Period" >
                    <b-row>
                        <b-col sm="4">
                            Close Accounting Period | Feature not ready
                        </b-col>
                        <b-col offset="4" sm="4">
                            <b-form-input 
                                v-model="filters.accountingperiod.criteria"
                                type="text" 
                                placeholder="Search"
                                debounce="250">
                            </b-form-input>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-table striped bordered borderless show-empty
                        :fields="tables.accountingperiod.fields"
                        :items.sync="tables.accountingperiod.items"
                        :filter="filters.accountingperiod.criteria"
                        :current-page="paginations.accountingperiod.currentPage"
                        :per-page="paginations.accountingperiod.perPage"
                        @filtered="onFiltered($event,'accountingperiod')"
                        >
                        </b-table>
                    </b-row>
                    <b-row mb="0">
                        <b-col sm="12" class="my-1 mb-0" >
                            <b-pagination mb="0"
                            v-model="paginations.accountingperiod.currentPage"
                            :total-rows="paginations.accountingperiod.totalRows"
                            :per-page="paginations.accountingperiod.perPage"
                            prev-text="Previous"
                            next-text="Next"
                            hide-goto-end-buttons
                            size="sm"
                            align="right"
                            ></b-pagination>
                        </b-col>
                    </b-row> 
                </b-tab>
            </b-tabs>
            </div>
      </b-card>
</div>
</template>

<script>
export default {
    name: 'generalconfiguration',
    components :{
    },
    data(){
        return {
            tables: {
                accountingperiod :{
                    fields:[
                        {
                            key:'date_covered',
                            label: 'Period',
                            sortable: true
                        },
                        {
                            key:'date_time_closed',
                            label: 'Date and Time Closed'
                        },
                        {
                            key:'user',
                            label:'Closed By'
                        },
                        {
                            key:'remarks',
                            label:'Remarks'
                        }
                    ],
                     items: [],
                },
            }, // END OF TABLES
            filters: {
                accountingperiod: {
                    criteria: null
                }
            }, // END OF FILTERS
            paginations: {
                accountingperiod: {
                    totalRows: 0,
                    currentPage: 1,
                    perPage: 5
                }
            }, // END OF PAGINATION
            options:{
                accounttitles : {
                    items: []
                }
            },
            forms:{
                suppliers:{
                    isSaving: false,
                    fields:{
                        input_tax_account_id : null,
                        payable_account_id : null,
                        payable_discount_account_id : null,
                        payment_to_supplier_id : null,
                        supplier_wtax_account_id : null,
                    }
                },
                customers:{
                    isSaving: false,
                    fields:{
                        output_tax_account_id : null,
                        receivable_account_id : null,
                        receivable_discount_account_id : null,
                        payment_from_customer_id : null,
                    }
                },
                others:{
                    isSaving: false,
                    fields:{
                        retained_earnings_id : null,
                        petty_cash_account_id : null,
                        depreciation_expense_debit_id : null,
                        fixed_asset_account_id : null,
                        depreciation_expense_credit_id : null,
                    }
                },
                inventory:{
                    isSaving: false,
                    fields:{
                        sales_invoice_inventory : null,
                        cash_invoice_inventory : null,
                        dispatching_invoice_inventory : null,
                    }
                },
            }
        } // END OF DATA RETURN
    }, // END OF DATA
    created(){
        this.refreshSettings()
        this.fillTableList('accountingperiod');
    }, // END OF CREATED
    methods:{
        async refreshSettings(){
         await this.$http.get('/api/generalconfiguration',{
            headers: { Authorization: 'Bearer ' + localStorage.getItem('token') }})
            .then((response) => {
                const records = response.data
                this.options.accounttitles.items = records.data.accounttitles
            })
            .catch(error => { if (!error.response) return console.log(error)
            })

         await this.$http.get('/api/generalconfiguration',{
            headers: { Authorization: 'Bearer ' + localStorage.getItem('token') }})
            .then((response) => {
                const records = response.data
                this.forms.suppliers.fields = records.data.current
                this.forms.customers.fields = records.data.current
                this.forms.others.fields = records.data.current
                this.forms.inventory.fields = records.data.current
            })
            .catch(error => { if (!error.response) return console.log(error)
            })
        },
        onSave(utility){
            this.forms[utility].isSaving = true;
            this.$http.put('api/genconf'+utility, this.forms[utility].fields ,{
                headers: { Authorization: 'Bearer ' + localStorage.getItem('token') } })
          .then((response) => {  
            this.forms[utility].isSaving = false;
            this.$notify({ type: 'success', group: 'notification', title: 'Success!',
              text: 'The '+utility+' settings have been successfully modified.'
            })
          }).catch(error => {
                this.forms[utility].isSaving = false;
                if (!error.response) return
                const errors = error.response.data.errors
                var a = 0
                for (var key in errors) {
                    if(a == 0){
                    this.focusElement(key, is_tab)
                    this.$notify({ type: 'error', group: 'notification', title: 'Error!', text: errors[key][0]})
                    } a++
                }
          })




        },
    } // END OF METHODS
}// END OF EXPORT 
</script>