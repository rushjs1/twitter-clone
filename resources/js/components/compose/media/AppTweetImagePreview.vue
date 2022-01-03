<template>
    <div class="flex flex-wrap mb-4">
        <div
            v-for="(image, index) in images"
            :key="index"
            class="w-6/12 flex-grow relative"
        >
            <img :src="generateImagePreview(image)" class="rounded-lg" />
            <a
                href="#"
                @click.prevent="removeImage(image)"
                class="bg-gray-800 w-8 h-8 rounded-full absolute top-0 right-0 mt-3 mr-3 flex items-center justify-center"
            >
                <icon-x />
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppTweetImagePreview",
    props: {
        images: {
            required: false,
            type: Array,
        },
    },
    methods: {
        generateImagePreview(img) {
            return URL.createObjectURL(img);
        },
        removeImage(img) {
            this.$emit("removed", img);
        },
    },
};
</script>
