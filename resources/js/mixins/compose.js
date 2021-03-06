import axios from "axios";

export default {
    name: "AppTweetCompose",
    data() {
        return {
            mediaTypes: {},
            media: {
                images: [],
                video: null,
                progress: 0,
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
    computed: {
        tweetHasMedia() {
            return this.media.images.length || this.media.video;
        },
    },
    methods: {
        async submitTweet() {
            if (this.tweetHasMedia) {
                let media = await this.uploadMedia();
                this.form.media = media.data.data.map((r) => r.id);
            }

            await this.post();

            this.form.body = "";
            this.form.media = [];
            this.media.video = null;
            this.media.images = [];
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
                onUploadProgress: this.handleUploadProgress,
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
        handleUploadProgress(event) {
            console.log(event);
            this.media.progress = parseInt(
                Math.round((event.loaded / event.total) * 100)
            );
        },
    },
    mounted() {
        this.getMediaTypes();
    },
};