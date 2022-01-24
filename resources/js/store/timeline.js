import axios from 'axios';
import {get} from 'lodash';
import getters from './tweets/getters';
import mutations from './tweets/mutations';
import actions from './tweets/actions';
export default {
    namespaced: true,
    state: {
        tweets: [],
    },
    getters,
    mutations,
    actions
}