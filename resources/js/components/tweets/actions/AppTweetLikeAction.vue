<template>
    <div>
        <div
            class="flex items-center text-base cursor-pointer"
            @click.prevent="likeOrUnlike"
        >
            <icon-heart :liked="liked" />
            <span :class="liked ? 'text-red-500' : 'text-gray-600'">
                {{ tweet.likes_count }}
            </span>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    name: "AppTweetLikeAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    computed: {
        ...mapGetters({
            likes: "likes/likes",
        }),

        liked() {
            return this.likes.includes(this.tweet.id);
        },
    },
    methods: {
        ...mapActions({
            likeTweet: "likes/likeTweet",
            unlikeTweet: "likes/unlikeTweet",
        }),
        getTweetId() {
            //    console.log(this.tweet.id);
        },
        likeOrUnlike() {
            if (this.liked) {
                this.unlikeTweet(this.tweet);
                return;
            }
            this.likeTweet(this.tweet);
        },
    },
};
</script>
