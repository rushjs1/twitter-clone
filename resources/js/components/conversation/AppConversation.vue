<template>
    <div>
        <div>
            <app-tweet v-for="t in parents(id)" :tweet="t" :key="t.id" />
        </div>
        <div class="text-lg border-b-8 border-t-8 border-gray-800">
            <app-tweet v-if="tweet(id)" :tweet="tweet(id)" />
        </div>
        <div>
            <app-tweet v-for="t in replies(id)" :tweet="t" :key="t.id" />
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    name: "AppConversation",
    props: {
        id: {
            required: true,
            type: String,
        },
    },
    computed: {
        ...mapGetters("conversation", {
            tweet: "tweet",
            parents: "parents",
            replies: "replies",
        }),
    },
    methods: {
        ...mapActions("conversation", {
            getTweets: "getTweets",
        }),
    },
    mounted() {
        this.getTweets(`/api/tweets/${this.id}`);
        this.getTweets(`/api/tweets/${this.id}/replies`);
    },
};
</script>
