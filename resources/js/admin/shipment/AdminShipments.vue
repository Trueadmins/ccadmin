<template>
    <v-container class="ga-2">
        <v-row>
            <v-col cols="6" md="6">
                <h2>Admin Shipments List</h2></v-col>
            <v-col cols="6" md="6">
<!--                <v-btn color="success" size="small" prependIcon="mdi-plus">Add Courier</v-btn>-->
            </v-col>
            <v-col cols="12" md="12">
                <v-card>
                    <v-data-table :items="shipments" :headers="headers" density="compact" itemsPerPage="25" :hideDefaultFooter="shipments.length < 25">

                        <template #item.company_name="{ item }">
                            <div>{{ item.company?.company_name }}</div>
                            <div>{{ item.user?.name }}</div>
                        </template>

                        <template #item.user_name="{ item }">
                            {{ item.user?.name }}
                        </template>

                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    name: "AdminShipments",
    data(){
        return{
            shipments:[],
            headers:[
                { title:'Ref', key:'reference' },
                { title:'Company', key:'company_name' },
                { title:'User', key:'user_name' },
                { title:'Country', key:'destination_country' },
                { title:'Amount', key:'total_amount' },
                { title:'Status', key:'status' },
                { title:'Date', key:'created_at' },
            ]
        }
    },
    async mounted(){
        await this.getAdminShipments();
    },
    methods:{
        async getAdminShipments(){
            const res = await axios.get('/admin/shipments');
            this.shipments = res.data.shipments
        }
    }
}
</script>

<style scoped>

</style>
