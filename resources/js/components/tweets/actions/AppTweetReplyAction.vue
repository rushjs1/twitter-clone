<template>
    <div>
        <a
            href=""
            class="flex items-center text-base"
            @click.prevent="openModal"
        >
            <icon-comment :count="tweet.replies_count" />
            <span
                :class="
                    tweet.replies_count > 0 ? 'text-blue-600' : 'text-gray-600'
                "
            >
                {{ tweet.replies_count }}
            </span>
        </a>
    </div>
</template>

<script>
import AppTweetReplyModal from "../../customComponents/modals/AppTweetReplyModal.vue";
export default {
    name: "AppTweetReplyAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            AppTweetReplyModal,
        };
    },
    methods: {
        openModal() {
            this.$modal.show(AppTweetReplyModal, { tweet: this.tweet });
        },
    },
};
</script>
