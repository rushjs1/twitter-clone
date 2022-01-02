import axios from "axios";


export default {
    namespaced: true,
    state: {
        retweets: []
    },
    getters:{
        retweets(state){
            return state.retweets
        },

    },

    mutations:{
            PUSH_RETWEETS(state, data){
            state.retweets.push(...data);

        },
        PUSH_RETWEET(state, id){
            state.retweets.push(id);

        },
        POP_RETWEET(state, id){
            const retweetIndex = state.retweets.findIndex((rt) =>  rt === id);
            state.retweets.splice(retweetIndex, 1);
        }
    },
    actions: {
        async retweetTweet (_, tweet)
        {
            await axios.post(`/api/tweets/${tweet.id}/retweets`);

        },
        async unretweetTweet (_, tweet)
        {
            await axios.delete(`/api/tweets/${tweet.id}/retweets`);

        },
        syncRetweet({commit, state}, id)
        {
            if(state.retweets.includes(id)){
                commit('POP_RETWEET', id)
                return
            }
            commit('PUSH_RETWEET', id);
        }
    }

}