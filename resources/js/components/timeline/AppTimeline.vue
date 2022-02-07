<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-tweet-compose />
        </div>

        <app-tweet
            class="w-full"
            v-for="tweet in tweets"
            :key="tweet.id"
            :tweet="tweet"
            @click="goConversation(tweet)"
        />

        <div
            v-if="tweets.length"
            v-observe-visibility="{
                callback: handleToScrolledTimeline,
            }"
        ></div>
    </div>
</template>

<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    name: "AppTimeline",
    data() {
        return {
            page: 1,
            lastPage: 1,
        };
    },
    computed: {
        ...mapGetters("timeline", {
            tweets: "tweets",
        }),
        urlWithPage() {
            return `/api/timeline?page=${this.page}`;
        },
    },
    methods: {
        ...mapActions("timeline", {
            getTweets: "getTweets",
        }),

        ...mapMutations({
            PUSH_TWEETS: "timeline/PUSH_TWEETS",
        }),
        handleToScrolledTimeline(isVisible) {
            if (!isVisible) {
                return;
            }

            if (this.lastPage === this.page) {
                return;
            }
            console.log("at Bottom");
            this.page++;
            this.loadTweets();
        },
        loadTweets() {
            this.getTweets(this.urlWithPage).then((res) => {
                this.lastPage = res.data.meta.last_page;
            });
        },
        goConversation(tweet) {
            console.log("hello");
            console.log("go To conversation view for tweet " + tweet.id);
        },
    },
    mounted() {
        this.loadTweets();

        Echo.private(`timeline.${this.$user.id}`).listen(
            ".TweetWasCreated",
            (e) => {
                this.PUSH_TWEETS([e]);
            }
        );
    },
};
</script>
