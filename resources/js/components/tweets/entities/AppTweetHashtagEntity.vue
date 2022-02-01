<template>
    <a :href="`/hashtags/${body}`"
        ><span @click="getInfo()">{{ body }}</span></a
    >
</template>

<script>
export default {
    name: "AppTweetHashtagEntity",
    props: {
        body: {
            required: true,
            type: String,
        },
    },
    methods: {
        getInfo() {
            console.log(this.body);
        },
    },
};
</script>
