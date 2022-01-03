<template>
    <form class="flex" @submit.prevent="submitTweet">
        <div class="mr-2">
            <img :src="$user.avatar" class="w-12 rounded-full" />
        </div>
        <div class="flex-grow">
            <app-tweet-compose-text-area v-model="form.body" />
            <div class="flex justify-between">
                <div>
                    <!-- actions -->
                </div>
                <div class="flex items-center justify-end">
                    <div>
                        <app-tweet-compose-limit
                            class="mr-2"
                            :body="form.body"
                            v-model="percentIsOver"
                        />
                    </div>
                    <button
                        ref="tweetBtn"
                        type="submit"
                        class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
                    >
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "AppTweetCompose",
    data() {
        return {
            form: {
                body: "",
            },
            percentIsOver: false,
        };
    },
    watch: {
        percentIsOver() {
            if (this.percentIsOver) {
                this.$refs.tweetBtn.disabled = true;

                this.$refs.tweetBtn.className =
                    "bg-blue-900 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none";
            } else {
                this.$refs.tweetBtn.disabled = false;
                this.$refs.tweetBtn.className =
                    "bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none";
            }
        },
    },
    methods: {
        async submitTweet() {
            await axios.post("/api/tweets", this.form);
            this.form.body = "";
        },
    },
};
</script>
