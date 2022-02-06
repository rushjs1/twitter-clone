import actions from './tweets/actions';
import mutations from './tweets/mutations';
export default {
    namespaced: true,
    state: {
        tweets: []
    },
    getters: {
      // tweet: (state) => { return state.tweets.filter(t => t.id == id)}
         tweet(state){
           return id => state.tweets.find(t => t.id == id);
       },
       parents(state) {
         return id => state.tweets.filter(t => {
           return t.id != id && !t.parent_ids.includes(parseInt(id));
         })
         .sort((a, b) => a.created_at - b.created_at);
       },
       replies (state) {
        return id => state.tweets.filter(t => t.parent_id == id).sort((a,b) => a.created_at - b.created_at)
       } 
    },
    mutations,
    actions
}