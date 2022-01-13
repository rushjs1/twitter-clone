import axios from 'axios';
import {get} from 'lodash';


export default {
    namespaced: true,
    state: {
        tweets: [],
    },
    getters: {
        tweets(state){
            return state.tweets.sort((a,b) => b.created_at - a.created_at);
        }
    },
    mutations: {
     PUSH_TWEETS (state, data) {
        state.tweets.push(
            ...data.filter((tweet) => {
                return !state.tweets.map((t) => t.id).includes(tweet.id)
            })
        )

     },
     POP_TWEET(state, id) {
        state.tweets = state.tweets.filter((t) => t.id !== id);
        
     },

     SET_LIKES(state, {id, count}){
             state.tweets = state.tweets.map((t) => {
                if (t.id === id){
                    t.likes_count = count;
                }
             
                   if(get(t.original_tweet, 'id') === id) {
                    t.original_tweet.likes_count = count
                }    
                return t
            }) 
     },
     SET_RETWEETS(state, {id, count})
     {
         state.tweets = state.tweets.map((t) => {
             if(t.id === id){
                t.retweets_count = count
             }

             if(get(t.original_tweet, 'id') === id){
                 t.original_tweet.retweets_count = count
             }
             return t
         })
     }
    },
    actions: {
     async getTweets({commit}, url) {

         let res = await axios.get(url);

        commit('PUSH_TWEETS', res.data.data);
        
        commit('likes/PUSH_LIKES', res.data.likes, {root: true} )
        commit('retweets/PUSH_RETWEETS', res.data.retweets, {root: true})
        return res;
     }
    }
}