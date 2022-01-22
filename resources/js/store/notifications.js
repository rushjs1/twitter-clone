import axios from "axios";

export default {
    namespaced: true,
    state: {
        notifications: [],
    },

    getters: {
        notifications(state) {
            return state.notifications
        }
    },

    mutations: {
        PUSH_NOTIFICATIONS(state,data) {
            state.notifications.push(...data);
        }
    },
    actions: {
       async  getNotifications({commit}, url){
            let res = await axios.get(url)
            commit('PUSH_NOTIFICATIONS', res.data.data);
            return res;
        }
    }
}