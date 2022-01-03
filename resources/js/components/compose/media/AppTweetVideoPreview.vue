<template>
    <div class="mb-4 relative">
        <video
            controls
            preload
            :src="generateVideoPreview(video)"
            class="rounded-lg"
        ></video>
        <a
            href="#"
            @click.prevent="removeVideo"
            class="bg-gray-800 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex items-center justify-center"
        >
            <icon-x />
        </a>
    </div>
</template>
<script>
export default {
    name: "AppTweetVideoPreview",
    props: {
        video: {
            required: true,
            type: File,
        },
    },
    methods: {
        generateVideoPreview(img) {
            return URL.createObjectURL(img);
        },
        removeVideo() {
            this.$emit("removed", this.video);
        },
    },
};
</script>
