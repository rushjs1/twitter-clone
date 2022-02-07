<template>
    <div
        class="w-full inline-block p-4 border-b border-gray-800 hover:bg-gray-800"
        @click="goConversation"
    >
        <component :is="`app-tweet-variant-${tweet.type}`" :tweet="tweet" />
    </div>
</template>

<script>
export default {
    name: "AppTweet",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },

    methods: {
        goConversation() {
            window.location.replace(
                `http://twitter.test/tweets/${this.tweet.id}`
            );
        },
    },
};
</script>
