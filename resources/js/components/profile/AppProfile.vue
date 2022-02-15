<template>
    <div>
        <div class="text-gray-300">Profile information</div>
        <div>
            <app-tweet
                class="w-full"
                v-for="tweet in tweets"
                :key="tweet.id"
                :tweet="tweet"
            />
        </div>
        <div
            v-if="tweets.length"
            v-observe-visibility="{
                callback: handleToScrolledProfile,
            }"
        ></div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "AppProfile",
    data() {
        return {
            page: 1,
            lastPage: 1,
        };
    },
    computed: {
        ...mapGetters("profile", {
            tweets: "tweets",
        }),
        urlWithPage() {
            return `api/profile?page=${this.page}`;
        },
    },
    methods: {
        ...mapActions("profile", {
            getTweets: "getTweets",
            getUser: "getUser",
        }),

        async loadTweets() {
            console.log("get profile tweets and info");
            this.getTweets(this.urlWithPage)
                .then((res) => {
                    //console.log(res.data.data);
                })
                .finally(() => {
                    this.getUser();
                });
        },
        handleToScrolledProfile(isVisible) {
            if (!isVisible) {
                return;
            }
            if (this.lastPage === this.page) {
                return;
            }

            console.log("at bottom");
            this.page++;
            this.loadTweets;
        },
    },
    mounted() {
        this.loadTweets();
    },
};
</script>
