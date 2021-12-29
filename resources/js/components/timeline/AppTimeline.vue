<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-tweet-compose />
        </div>

        <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />

        <div
            v-if="tweets.length"
            v-observe-visibility="{
                callback: handleToScrolledTimeline,
            }"
        ></div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
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
    },
    mounted() {
        this.loadTweets();
    },
};
</script>
