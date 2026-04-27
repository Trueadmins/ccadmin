import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
    state:{
        user: window.APP_USER || JSON.parse(localStorage.getItem('user') || 'null'),
        company:{
            name:'Courier City Ltd.',
            address_line1:"32 High Street",
            address_line2:"Southall",
            address_line3:"Ealing",
            town:"Southall",
            postcode:"UB1 3DA",
            country:"United Kingdom",
        },
        users:[],
        activeCountries:[],
        companies:[],
        couriers:[],
        companyCouriers:[]
    },
    mutations:{
        SET_USER(state, user){
            state.user = user
            localStorage.setItem('user', JSON.stringify(user))
        },
        LOGOUT(state){
            state.user = null;
            localStorage.removeItem('user')
        },
        SET_USERS(state, users){
            state.users = users;
        },
        SET_ACTIVE_COUNTRIES(state, countries){
            state.activeCountries = countries;
        },
        SET_COMPANIES(state, companies){
            state.companies = companies;
        },
        SET_COURIERS(state, couriers){
            state.couriers = couriers;
        },
        SET_COMPANY_COURIERS(state, list){
            state.companyCouriers = list;
        }
    },
    getters:{
        user:state => state.user,
        isAuthenticated: state => !!state.user,
        isSuperadmin: state => state.user?.role === 'superadmin',
        isUser: state => state.user?.role === 'user',
    },
    actions:{
        async logout({commit}){
            await axios.post('/logout')
            commit('LOGOUT');
            window.location.href = '/login';
        },
        async fetchUsers({commit}){
            const res = await axios.get('/admin/users');
            commit('SET_USERS', res.data.users);
        },
        async fetchActiveCountries({commit}){
            const res = await axios.get('/admin/active-countries');
            commit('SET_ACTIVE_COUNTRIES',res.data.countries);
        },
        async fetchCompanies({commit}){
            const res = await axios.get('/admin/companies');
            commit('SET_COMPANIES', res.data.companies);
        },

        async fetchCouriers({commit}){
            const res = await axios.get('/admin/couriers');
            commit('SET_COURIERS', res.data.couriers);
        },
        async createCourier({dispatch}, payload){
            await axios.post('/admin/courier/add', payload);
            dispatch('fetchCouriers');
        },
        async updateCourier({dispatch}, payload){
            await axios.post(`/admin/courier/update`, payload);
            dispatch('fetchCouriers');
        },
        async fetchCompanyCouriers({commit}, companyId){
            const res = await axios.get(`/admin/company/${companyId}/couriers`);
            const list = res.data.couriers.map(c => ({
                courier_id: c.courier_id, // courier id (for UI loop)
                company_courier_id: c.company_courier_id, // VERY IMPORTANT
                name: c.name,
                code: c.code,
                is_active: !!c.is_active,
                global_active: !!c.global_active,

                services: (c.services || []).map(s => ({
                    id: s.id,
                    service_name: s.service_name,
                    service_code: s.service_code,
                    is_active: !!s.is_active
                }))
            }));
            commit('SET_COMPANY_COURIERS', list);
        },
        async toggleCompanyCourier({dispatch}, {companyId, courier_id, is_active}){
            await axios.post(`/admin/company/${companyId}/couriers`, {
                courier_id,
                is_active: is_active ? 1 : 0
            });
            dispatch('fetchCompanyCouriers', companyId);
        },
        async createUser({dispatch}, payload){
            await axios.post('/admin/user/add', payload);
            dispatch('fetchUsers');
        },
        async updateUser({dispatch}, payload){
            if(!payload.password){
                delete payload.password;
            }

            await axios.put(`/admin/user/update/${payload.id}`, payload);
            dispatch('fetchUsers');
        }
    }
})

export default store;
