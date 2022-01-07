<template>
    <div>
        <div class="flex w-full">
            <img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full" />
            <div class="flex-grow">
                <app-tweet-username :user="tweet.user" />
                <p class="text-gray-300">
                    {{ tweet.body }}
                </p>
                <div class="flex flex-wrap mb-4 mt-4" v-if="images">
                    <div
                        class="w-6/12 flex-grow"
                        v-for="(image, index) in images"
                        :key="index"
                    >
                        <img :src="image" class="rounded-lg" />
                    </div>
                </div>

                <div v-if="video" class="mt-4 mb-4">
                    <video :src="video.url" controls class="rounded-lg"></video>
                </div>

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
    data() {
        return {
            newUrls: [],
        };
    },
    computed: {
        images() {
            let imgs = this.tweet.media.data.filter((m) => m.type === "image");
            imgs.forEach((i) => {
                let url = i.url;
                let newUrl = url.replace("localhost", "twitter.test");
                this.newUrls.push(newUrl);
            });
            console.log(this.newUrls);
            // return this.tweet.media.data.filter((m) => m.type === "image");
            return this.newUrls;
        },
        video() {
            let vid = this.tweet.media.data.filter((m) => m.type === "video");
            return vid;
        },
    },
};
</script>
