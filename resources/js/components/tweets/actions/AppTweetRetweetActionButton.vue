<template>
    <div>
        <div
            class="flex items-center text-base"
            @click="$emit('click', $event)"
        >
            <icon-repeat :isRetweeted="retweeted" />

            <span
                class="text-gray-600"
                :class="{ 'text-green-600': retweeted }"
            >
                {{ tweet.retweets_count }}
            </span>
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
    name: "AppTweetRetweetActionButton",
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
};
</script>
