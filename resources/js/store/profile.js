import axios from 'axios';
import {get} from 'lodash';
import getters from './tweets/getters';
import mutations from './tweets/mutations';
import actions from './tweets/actions';
export default {
    namespaced: true,
    state: {
        tweets: [],
        user: []
    },
    getters: {
        ...getters,
        user: (state) => state.user
    },
    mutations:{ 
        ...mutations,
        setUser(state, data){
            state.user = data 
        }
    },
    actions: {
        ...actions,
       async getUser({commit}, id){
            var res = await axios.get(`/api/user?id=${id}`)
            commit('setUser', res.data.data)
        }
    }
}