<template>
    <div>
        <ul class="flex mt-4 text-gray-500">
            <li class="w-3/12">
                <app-tweet-reply-action :tweet="tweet" />
            </li>
            <li class="w-3/12">
                <app-tweet-retweet-action :tweet="tweet" />
            </li>
            <li class="w-3/12">
                <app-tweet-like-action :tweet="tweet" />
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "AppTweetActionGroup",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
