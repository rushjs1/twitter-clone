

export default {
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
         getNotifications(){
            console.log('abc');
        }
    }
}