<template>
    <form class="flex" @submit.prevent="submitTweet">
        <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
        <div class="flex-grow">
            <app-tweet-compose-text-area
                v-model="form.body"
                :placeholder="'Whats Happening?'"
            />

            <app-tweet-media-progress
                class="mb-4"
                :progress="media.progress"
                v-if="media.progress && tweetHasMedia"
            />

            <app-tweet-image-preview
                :images="media.images"
                v-if="media.images.length"
                @removed="removeImage"
            />
            <app-tweet-video-preview
                v-if="media.video"
                :video="media.video"
                @removed="removeVideo"
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
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import compose from "../../mixins/compose";
import axios from "axios";
export default {
    mixins: [compose],
    methods: {
        async post() {
            await axios.post("/api/tweets", this.form);
        },
    },
};
</script>
