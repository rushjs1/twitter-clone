<template>
    <div>
        <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    name: "AppTimeline",
    computed: {
        ...mapGetters("timeline", {
            tweets: "tweets",
        }),
    },
    methods: {
        ...mapActions("timeline", {
            getTweets: "getTweets",
        }),
    },
    mounted() {
        this.getTweets();
    },
};
</script>
