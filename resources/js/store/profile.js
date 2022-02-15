import axios from 'axios';
import {get} from 'lodash';
import getters from './tweets/getters';
import mutations from './tweets/mutations';
import actions from './tweets/actions';
export default {
    namespaced: true,
    state: {
        tweets: [],
        user: {}
    },
    getters,
    mutations:{ 
        ...mutations,
        setUser(data){
            console.log(data);
        
        }
    },
    actions: {
        ...actions,
        getUser({commit}, data){
            commit('setUser', data)
        }
    }
}