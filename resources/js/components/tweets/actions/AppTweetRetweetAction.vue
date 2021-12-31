<template>
    <div>
        <a href="" class="flex items-center text-base">
            <icon-repeat />
            <span class="text-gray-600">0</span>
        </a>
    </div>
</template>
<script>
export default {
    name: "AppTweetRetweetAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
