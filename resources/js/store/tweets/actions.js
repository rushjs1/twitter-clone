export default{
    async getTweets({commit}, url) {

        let res = await axios.get(url);

       commit('PUSH_TWEETS', res.data.data);
       
       commit('likes/PUSH_LIKES', res.data.likes, {root: true} )
       commit('retweets/PUSH_RETWEETS', res.data.retweets, {root: true})
       return res;
    },

    async quoteTweet(_, {tweet,data}){
       await axios.post(`/api/tweets/${tweet.id}/quotes`, data);
    },

    async replyToTweet(_, {tweet, data})
    {
        await axios.post(`/api/tweets/${tweet.id}/replies`, data);
    }
}