<template>
    <div>
        <a href="" class="flex items-center text-base">
            <icon-comment />
            <span class="text-gray-600"> 0 </span>
        </a>
    </div>
</template>

<script>
export default {
    name: "AppTweetReplyAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
