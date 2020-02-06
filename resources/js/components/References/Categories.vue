<template>
<div>
        <notifications group="notification" />
      <b-card border-variant="default" class="text-left card-header-primary">
        <h5 slot="header">
            <span >Categories
                <small>  <b-icon-question></b-icon-question></small>
            </span>
        </h5>


        <b-row class="mb-2">
            <b-col sm="2">
                <b-button class="mb-2" variant="success" 
                    @click="$refs.categoryentry.showModalEntry = true, 
                            $refs.categoryentry.entryMode='Add', 
                            $refs.categoryentry.clearFields('category')">
                        <i class="fa fa-file-o"></i> &nbsp;New Category
                </b-button>
            </b-col>
            <b-col sm="6">
            </b-col>
            <b-col sm="4">
                <b-input-group prepend-html='<i class="fa fa-search"></i> &nbsp; Search'>
                    <b-form-input 
                                v-model="filters.categories.criteria"
                                type="text" 
                                placeholder="Search"
                                debounce="250">
                    </b-form-input>
                </b-input-group>
            </b-col>
        </b-row>
        <b-row mb="2">
            <b-table striped bordered borderless show-empty
            :fields="tables.categories.fields"
            :items.sync="tables.categories.items"
            :filter="filters.categories.criteria"
            :current-page="paginations.categories.currentPage"
            :per-page="paginations.categories.perPage"
            @filtered="onFiltered($event,'categories')"
            >
                <template v-slot:cell(action)="data">
                    <b-btn :size="'sm'" variant="primary" @click="$refs.categoryentry.setUpdate(data)">
                        <b-icon-pencil></b-icon-pencil>
                    </b-btn>

                    <b-btn :size="'sm'" variant="danger" @click="$refs.deleteentry.setDelete(data.item.category_id)">
                        <b-icon-trash></b-icon-trash>
                    </b-btn>
                </template>

            </b-table>

        </b-row>
        <template v-slot:footer> 
            <b-row mb="0">
                <b-col sm="12" class="my-1 mb-0" >
                    <b-pagination mb="0"
                    v-model="paginations.categories.currentPage"
                    :total-rows="paginations.categories.totalRows"
                    :per-page="paginations.categories.perPage"
                    prev-text="Previous"
                    next-text="Next"
                    hide-goto-end-buttons
                    size="sm"
                    align="right"
                    ></b-pagination>
                </b-col>
            </b-row> 
        </template>  
      </b-card>
    <categoryentry type="reference" ref="categoryentry"></categoryentry>
    <deleteentry entity="category" table="categories" primary_key="category_id" ref="deleteentry"></deleteentry>
</div>
</template>

<script>
import categoryentry from '../modals/CategoryEntry'
import deleteentry from '../modals/DeleteEntry'
export default {
    name: 'categories',
    components :{
        categoryentry,
        deleteentry

    },
    data(){
        return {
        entryMode: 'Add',
        showModalEntry: false,
        showModalDelete: false,
            tables: {
                categories :{
                    fields:[
                        {
                            key:'category_name',
                            label: 'Name',
                            sortable: true
                        },
                        {
                            key:'category_desc',
                            label: 'Description'
                        },
                        {
                            key:'action',
                            label:'Action'
                        }
                    ],
                     items: [],
                },
            }, // END OF TABLES
            filters: {
                categories: {
                    criteria: null
                }
            }, // END OF FILTERS
            paginations: {
                categories: {
                    totalRows: 0,
                    currentPage: 1,
                    perPage: 5
                }
            } // END OF PAGINATION
        } // END OF DATA RETURN
    }, // END OF DATA
    created(){
        this.fillTableList('categories');
    }, // END OF CREATED
    methods:{
    } // END OF METHODS
}// END OF EXPORT 
</script>