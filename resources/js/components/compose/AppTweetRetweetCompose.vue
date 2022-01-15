<template>
    <form class="flex" @submit.prevent="submitTweet">
        <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
        <div class="flex-grow">
            <app-tweet-compose-text-area
                v-model="form.body"
                :placeholder="'Add a comment'"
            />

            <div class="flex justify-between">
                <ul class="flex items-center">
                    <li class="mr-4">
                        <app-tweet-compose-media-button
                            id="media-compose"
                            @selected="handleMediaSelected"
                        />
                    </li>
                </ul>

                <div class="flex items-center justify-end">
                    <div>
                        <app-tweet-compose-limit
                            class="mr-2"
                            :body="form.body"
                            v-model="percentValidated"
                        />
                    </div>
                    <button
                        ref="tweetBtn"
                        type="submit"
                        class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none"
                    >
                        Retweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import compose from "../../mixins/compose";
import axios from "axios";
import { mapActions } from "vuex";
export default {
    mixins: [compose],
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    methods: {
        ...mapActions("timeline", {
            quoteTweet: "quoteTweet",
        }),
        async post() {
            await this.quoteTweet({
                tweet: this.tweet,
                data: this.form,
            });
        },
    },
};
</script>
