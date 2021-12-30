<template>
    <div>
        <!--       <div class="flex w-full">
            <div class="mr-3">
                <img :src="tweet.user.avatar" class="w-12 rounded-full" />
            </div>
            <div>
                <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300">
                    {{ tweet.body }}
                </p>
            </div>
        </div> -->

        <div
            class="text-gray-600 font-bold text-xs flex items-center mb-2 mx-2"
        >
            <span>
                <icon-repeat />
            </span>
            <span> {{ tweet.user.name }} retweeted </span>
        </div>

        <component
            :is="`app-tweet-variant-${tweet.original_tweet.type}`"
            :tweet="tweet.original_tweet"
        />
    </div>
</template>

<script>
export default {
    name: "AppTweetVariantRetweet",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
