<template>
    <a :href="`/users/${body}`"
        ><span @click="getInfo()"> {{ body }} </span></a
    >
</template>

<script>
export default {
    name: "AppTweetMentionEntity",
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
