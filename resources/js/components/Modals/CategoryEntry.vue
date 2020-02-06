<template>
    <b-modal 
        v-model="showModalEntry"
        :noCloseOnEsc="true"
        :noCloseOnBackdrop="true"
        @shown="focusElement('category_name')"
    >
        <div slot="modal-title">
            Category  <small> | {{entryMode}}</small>
        </div>
        <b-col lg=12>
            <b-form autocomplete="off">
                <b-form-group>
                    <label class="required" for="category_name">Category Name</label>
                    <b-form-input
                        ref="category_name"
                        id="category_name"
                        v-model="forms.category.fields.category_name"
                        debounce="250"
                        type="text"
                        placeholder="Name">
                    </b-form-input>
                </b-form-group>
                <b-form-group>
                    <label class="required">Description</label>
                    <b-form-input
                        ref="category_desc"
                        id="category_desc"
                        v-model="forms.category.fields.category_desc"
                        debounce="250"
                        type="text"
                        placeholder="Description">
                    </b-form-input>
                </b-form-group>
            </b-form>
        </b-col>
        <div slot="modal-footer">
            <b-button :disabled="forms.category.isSaving" variant="success" @click="onCategoryEntry">
                  <b-spinner v-if="forms.category.isSaving" small variant="light" label="Spinning"></b-spinner>
                <i class="fa fa-check"></i>
                Save
            </b-button>
            <b-button variant="danger" @click="showModalEntry=false">Close</b-button>            
        </div>
    </b-modal>
</template>
<script>
export default {
    name: 'categoryentry',
    props: ['type'],
    data() {
        return {
            entryMode: 'Add',
            showModalEntry: false, //if true show modal
            forms: {
                category : {
                    isSaving: false,
                    fields: {
                        category_id: null,
                        category_name: null,
                        category_desc: null
                    }
                }
            },
            row: []
        }
    },
    methods:{
        onCategoryEntry () {
            if(this.type == 'reference'){
                if(this.entryMode == 'Add'){
                    this.$parent.createEntityRef('category', true, 'categories', 'categoryentry')
                }
                else{
                    this.$parent.updateEntityRef('category', 'category_id', true, this.row, 'categoryentry')
                }
            }
            else{
                alert('NOT IN USE');
                // this.$parent.createOptionsEntityRef('category', 'showModalEntry', 'categories', this.type, 'category_id', 'categoryentry')
            }
        },
        setUpdate(data){
            this.row = data.item
            this.fillEntityForm('category', data.item.category_id, 'showModalEntry')
            this.entryMode='Edit'
        }
    },
}
</script>