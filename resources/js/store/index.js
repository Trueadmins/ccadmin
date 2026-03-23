import { createStore } from "vuex";
import axios from "axios";

const store = createStore({
    state:{
        user: window.APP_USER || JSON.parse(localStorage.getItem('user') || 'null'),
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
