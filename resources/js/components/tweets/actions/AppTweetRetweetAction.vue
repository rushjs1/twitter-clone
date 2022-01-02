<template>
    <div>
        <app-dropdown>
            <template slot="trigger">
                <div class="flex items-center text-base">
                    <icon-repeat :isRetweeted="retweeted" />
                    <span
                        class="text-gray-600"
                        :class="{ 'text-green-600': retweeted }"
                    >
                        {{ tweet.retweets_count }}
                    </span>
                </div>
            </template>

            <app-dropdown-item @click.prevent="retweet">
                Retweet
            </app-dropdown-item>

            <app-dropdown-item @click.prevent="quote">
                Retweet with comment
            </app-dropdown-item>
        </app-dropdown>
    </div>
</template>
<script>
import AppDropdownItem from "../../dropdown/AppDropdownItem.vue";
import { mapGetters } from "vuex";

export default {
    components: { AppDropdownItem },
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
        retweet() {
            console.log("retweet");
        },
        quote() {
            console.log("quote");
        },
    },
};
</script>
