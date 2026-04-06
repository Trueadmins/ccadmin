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
        }
    },
    mutations:{
        SET_USER(state, user){
            state.user = user
            localStorage.setItem('user', JSON.stringify(user))
        },
        LOGOUT(state){
            state.user = null
            state.shop = null
        }
    },
    getter:{
        user:state => state.user,
        isAuthenticated: state => !!state.user,
    },
    actions:{
        async logout({commit}){
            await axios.post('/logout')
            commit('LOGOUT');
            window.location.href = '/login';
        },
    }
})

export default store;
