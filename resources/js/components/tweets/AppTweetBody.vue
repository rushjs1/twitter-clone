<template>
    <div>
        <p class="text-gray-300">
            <component :is="body" />
        </p>
    </div>
</template>

<script>
export default {
    name: "AppTweetBody",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            hashtags: {},
            mentions: {},
        };
    },
    computed: {
        body() {
            return {
                template: `<div> ${this.tweet.body}</div>`,
            };
        },
    },
};
</script>
