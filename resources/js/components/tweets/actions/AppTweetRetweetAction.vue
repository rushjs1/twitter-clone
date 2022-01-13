<template>
    <div>
        <app-dropdown v-if="!retweeted">
            <template slot="trigger">
                <app-tweet-retweet-action-button :tweet="tweet" />
            </template>

            <app-dropdown-item @click.prevent="retweetOrUnretweet">
                Retweet
            </app-dropdown-item>

            <app-dropdown-item @click.prevent="quote">
                Retweet with comment
            </app-dropdown-item>
        </app-dropdown>
        <app-tweet-retweet-action-button
            v-else
            :tweet="tweet"
            @click.prevent="retweetOrUnretweet"
        />
    </div>
</template>
<script>
import AppDropdownItem from "../../dropdown/AppDropdownItem.vue";
import { mapGetters, mapActions } from "vuex";
import AppTweetRetweetActionButton from "./AppTweetRetweetActionButton.vue";
import AppTweetRetweetModal from "./../../customComponents/modals/AppTweetRetweetModal.vue";

export default {
    components: {
        AppDropdownItem,
        AppTweetRetweetActionButton,
        AppTweetRetweetModal,
    },
    name: "AppTweetRetweetAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    computed: {
        ...mapGetters("retweets", {
            retweets: "retweets",
        }),
        retweeted() {
            return this.retweets.includes(this.tweet.id);
        },
    },
    methods: {
        ...mapActions("retweets", {
            retweetTweet: "retweetTweet",
            unretweetTweet: "unretweetTweet",
        }),
        retweetOrUnretweet() {
            console.log("running");
            if (this.retweeted) {
                this.unretweetTweet(this.tweet);
                return;
            }
            this.retweetTweet(this.tweet);
        },

        retweet() {
            console.log("retweet");
        },
        quote() {
            console.log("quote");
            this.$modal.show(AppTweetRetweetModal, {
                tweet: this.tweet,
            });
        },
    },
};
</script>
