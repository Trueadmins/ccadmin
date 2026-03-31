<template>
    <v-container fluid class="pa-2">
        <v-row align="center" density="compact">
            <v-col cols="12" md="8">
                <h2>Shipment Dashboard</h2>
                <p>Track your logistics and active cargo in real time</p>
            </v-col>
            <v-col cols="12" md="4">
                <v-btn color="success" variant="elevated" size="small" prependIcon="mdi-plus">Create New Shipment</v-btn>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" md="4">
                <v-card>
                    <v-card-item title="In Transit" appendIcon="mdi-truck-fast" class="text-blue-600 font-bold"></v-card-item>
                    <v-card-text><h2>12</h2></v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card>
                    <v-card-item title="Pending Approval" appendIcon="mdi-truck-alert" class="text-yellow-600 font-bold"></v-card-item>
                    <v-card-text><h2>5</h2></v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card>
                    <v-card-item title="Delivered" appendIcon="mdi-check-decagram" class="text-green-600 font-bold"></v-card-item>
                    <v-card-text><h2>148</h2></v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" md="8">
                <h3 class="mb-2">Recent Shipments</h3>
                <div class="border border-gray-100 rounded-md shadow">
                    <v-data-table striped="even" density="compact" :items="shipments" :headers="shipmentHeaders"
                                  hide-default-footer mobileBreakpoint="sm">
                        <template v-slot:item.status="{item}">
                            <v-chip v-if="item.status === 'Pending'" density="compact" size="small" variant="outlined" color="warning" class="font-weight-medium">{{item.status}}</v-chip>
                            <v-chip v-else-if="item.status === 'In Transit'" density="compact" size="small" variant="outlined" color="blue" class="font-weight-medium">{{item.status}}</v-chip>
                            <v-chip v-else-if="item.status === 'Delivered'" density="compact" size="small" variant="outlined" color="success" class="font-weight-medium">{{item.status}}</v-chip>
                            <v-chip v-else density="compact" size="small" variant="tonal" color="warning" class="font-weight-medium">{{item.status}}</v-chip>
                        </template>
                    </v-data-table>
                </div>
            </v-col>
            <v-col cols="12" md="4">
                <h3 class="mb-2">Live Tracker</h3>
                <v-card class="rounded-md">
                    <v-card-title>Current Shipment</v-card-title>
                    <v-card-text>
                        <div class="d-flex ga-1">
                            <v-icon color="success" size="x-small" class="animate-pulse">mdi-circle</v-icon>
                            <span class="font-medium">#{{shipments[0].id}}</span>
                            <span>*</span>
                            <span class="text-xs">{{shipments[0].status}}</span>
                        </div>

                        <div>Passing through chicago terminal</div>
                        <div>ETA: {{shipments[0].eta}}</div>
                    </v-card-text>

                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: "ShipmentDashboard",
    data(){
        return{
            shipments:[
                {id:"SH-1236",recipient:'Acme Company',status:"In Transit",eta:"Apr 03,2026"},
                {id:"SH-1235",recipient:'Acme Company',status:"Pending",eta:"Apr 03,2026"},
                {id:"SH-1234",recipient:'Acme Company',status:"Delivered",eta:"March 20,2026"},
                {id:"SH-1233",recipient:'Acme Company',status:"In Transit",eta:"Apr 02,2026"},
                {id:"SH-1232",recipient:'Acme Company',status:"In Transit",eta:"Apr 01,2026"},
                {id:"SH-1231",recipient:'Acme Company',status:"In Transit",eta:"Apr 01,2026"},
            ],
            shipmentHeaders:[
                {title:'Tracking ID',key:'id',width:150},
                {title:'Recipient',key:'recipient',width:150},
                {title:'Status',key:'status',width:150},
                {title:'ETA',key:'eta',width:150},
            ]
        }
    }
}
</script>

<style>
thead tr {background-color: rgb(var(--v-theme-surface-light))}
</style>
