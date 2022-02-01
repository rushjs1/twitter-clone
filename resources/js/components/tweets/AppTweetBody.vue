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
                template: `<div> ${this.replaceEntites(this.tweet.body)}</div>`,
            };
        },
        entities() {
            return this.tweet.entities.data.sort((a, b) => b.start - a.start);
        },
    },
    methods: {
        replaceEntites(body) {
            this.entities.forEach((entity) => {
                body =
                    body.substring(0, entity.start) +
                    this.entityComponent(entity) +
                    body.substring(entity.end, body.length);
            });

            return body;
        },
        entityComponent(entity) {
            return `<app-tweet-${entity.type}-entity body="${entity.body}"/>`;
        },
    },
};
</script>
