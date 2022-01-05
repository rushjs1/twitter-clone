<template>
    <form class="flex" @submit.prevent="submitTweet">
        <img :src="$user.avatar" class="mr-3 w-12 h-12 rounded-full" />
        <div class="flex-grow">
            <app-tweet-compose-text-area v-model="form.body" />
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
import axios from "axios";
export default {
    name: "AppTweetCompose",
    data() {
        return {
            mediaTypes: {},
            media: {
                images: [],
                video: null,
            },
            form: {
                body: "",
                media: [],
            },
            percentValidated: false,
        };
    },
    watch: {
        percentValidated() {
            if (this.percentValidated) {
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
            await this.uploadMedia();
            //await axios.post("/api/tweets", this.form);
            this.form.body = "";
        },
        buildMediaForm() {
            let form = new FormData();
            if (this.media.images.length) {
                this.media.images.forEach((image, index) => {
                    form.append(`media[${index}]`, image);
                });
            }
            if (this.media.video) {
                form.append(`media[0]`, this.media.video);
            }
            return form;
        },
        async uploadMedia() {
            return await axios.post("/api/media", this.buildMediaForm(), {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            });
        },
        async getMediaTypes() {
            let res = await axios.get("/api/media/types");
            this.mediaTypes = res.data.data;
        },
        handleMediaSelected(files) {
            console.log(files);
            Array.from(files)
                .slice(0, 4)
                .forEach((file) => {
                    if (this.mediaTypes.image.includes(file.type)) {
                        this.media.images.push(file);
                    }

                    if (this.mediaTypes.video.includes(file.type)) {
                        this.media.video = file;
                    }
                });

            if (this.media.video) {
                this.media.images = [];
            }
        },
        removeVideo() {
            this.media.video = null;
        },
        removeImage(img) {
            this.media.images = this.media.images.filter((i) => img !== i);
        },
    },
    mounted() {
        this.getMediaTypes();
    },
};
</script>
