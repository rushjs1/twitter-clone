<template>
    <div>
        <component
            v-if="tweet"
            class="border border-gray-700 rounded-lg mt-4 p-4"
            :is="`app-tweet-variant-${tweet.type}`"
            :tweet="tweet"
        />
    </div>
</template>
<script>
export default {
    name: "AppTweetRetweetModal",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
