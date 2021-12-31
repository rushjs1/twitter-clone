<template>
    <div>
        <app-dropdown>
            <template slot="trigger">
                <div class="flex items-center text-base">
                    <icon-repeat />
                    <span class="text-gray-600">
                        {{ tweet.retweets_count }}
                    </span>
                </div>
            </template>

            <app-dropdown-item @click.prevent="retweet">
                Retweet
            </app-dropdown-item>

            <app-dropdown-item @click.prevent="quote">
                Retweet with comment
            </app-dropdown-item>
        </app-dropdown>
    </div>
</template>
<script>
import AppDropdownItem from "../../dropdown/AppDropdownItem.vue";
export default {
    components: { AppDropdownItem },
    name: "AppTweetRetweetAction",
    props: {
        tweet: {
            required: true,
            type: Object,
        },
    },
    methods: {
        retweet() {
            console.log("retweet");
        },
        quote() {
            console.log("quote");
        },
    },
};
</script>
