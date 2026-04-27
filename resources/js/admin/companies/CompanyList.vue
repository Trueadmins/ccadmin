<template>
    <v-container class="pa-2">
        <v-row dense>
            <v-col cols="6" md="6">
                <h2>Companies List</h2></v-col>
            <v-col cols="6" md="6">
                <v-btn link :to="{name:'CompanyAdd'}" color="success" size="small" prependIcon="mdi-plus">Add Company</v-btn>
            </v-col>
            <v-col cols="12" md="12">
                <v-card>
                    <v-text-field v-model="csearch" variant="outlined" density="compact" class="pa-2" prependInnerIcon="mdi-magnify"
                                  label="Search Companies" hide-details></v-text-field>
                    <v-data-table :items="companies" :headers="companyHeaders" density="compact" :search="csearch">
                        <template v-slot:item.actions="{item}">
                            <v-btn link :to="{name:'CompanyEdit',params:{id:item.id}}" color="info" size="small">Edit</v-btn>
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    name: "CompanyList",
    computed:{
        companies(){
            return this.$store.state.companies;
        },
    },
    mounted() {
        this.$store.dispatch('fetchCompanies');
    },
    data(){
        return{
            csearch:'',
            companyHeaders:[
                {title:'Name',key:'name'},
                {title:'Email',key:'email'},
                {title:'Phone',key:'phone'},
                {title:'Status',key:'is_active'},
                {title:'Actions',key:'actions'},
            ]
        }
    }
}
</script>

<style scoped>

</style>
