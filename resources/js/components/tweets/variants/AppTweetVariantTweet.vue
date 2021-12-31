<template>
    <div>
        <div class="flex w-full">
            <div class="mr-3">
                <img :src="tweet.user.avatar" class="w-12 rounded-full" />
            </div>
            <div class="flex-grow">
                <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300">
                    {{ tweet.body }}
                </p>

                <app-tweet-action-group :tweet="tweet" />
            </div>
        </div>
    </div>
</template>

<script>
import IconComment from "../../icons/IconComment.vue";
import IconHeart from "../../icons/IconHeart.vue";
import IconRepeat from "../../icons/IconRepeat.vue";
export default {
    components: { IconComment, IconRepeat, IconHeart },
    name: "AppTweetVariantTweet",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
};
</script>
