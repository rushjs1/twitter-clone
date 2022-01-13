<template>
    <div>
        <textarea
            class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none"
            :placeholder="placeholder"
            autofocus
            @input="
                emitInput($event);
                resize($event);
            "
            :value="value"
        ></textarea>
    </div>
</template>

<script>
export default {
    name: "AppTweetComposeTextArea",
    props: {
        value: {
            required: false,
        },
        placeholder: {
            required: false,
            type: String,
        },
    },
    methods: {
        emitInput(e) {
            this.$emit("input", e.target.value);
        },
        resize(e) {
            e.target.style.height = "auto";
            e.target.style.height = `${e.target.scrollHeight}px`;
        },
    },
};
</script>
