<template>
    <div>
        <div
            class="w-full inline-block p-4 border-b border-gray-800 text-gray-300"
        >
            <div class="w-full inline-block h-12 border border-gray-400">
                Banner image here
            </div>
            <div class="flex justify-between mt-4">
                <div>
                    <img
                        :src="user.avatar"
                        class="w-12 h-12 mr-3 rounded-full"
                    />
                </div>
                <div
                    class="bg-gray-500 rounded-lg text-gray-100 p-2 text-xs h-8"
                >
                    Edit Profile
                </div>
            </div>
            <div class="text-gray-400 mt-4">
                {{ user.name }}
            </div>
            <div class="text-gray-400 mt-4 flex">
                <div>
                    <icon-calendar />
                </div>
                <div>
                    Joined in
                    {{ joinedInMonth }}
                    {{ joinedInYear }}
                </div>
            </div>
        </div>
        <div>
            <app-tweet
                class="w-full"
                v-for="tweet in tweets"
                :key="tweet.id"
                :tweet="tweet"
            />
        </div>
        <div
            v-if="tweets.length"
            v-observe-visibility="{
                callback: handleToScrolledProfile,
            }"
        ></div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import IconCalendar from "../icons/IconCalendar.vue";
export default {
    components: { IconCalendar },
    name: "AppProfile",
    data() {
        return {
            page: 1,
            lastPage: 1,
        };
    },
    computed: {
        ...mapGetters("profile", {
            tweets: "tweets",
            user: "user",
        }),
        urlWithPage() {
            return `api/profile?page=${this.page}`;
        },
        joinedInMonth() {
            if (this.user) {
                let usr = this.user.joined.split("-").slice(0, 2)[1];

                switch (usr) {
                    case "1":
                        return "January";
                        break;
                    case "2":
                        return "Febuary";
                        break;
                    case "3":
                        return "March";
                        break;
                    case "4":
                        return "April";
                        break;
                    case "5":
                        return "May";
                        break;
                    case "6":
                        return "June";
                        break;
                    case "7":
                        return "July";
                        break;
                    case "8":
                        return "August";
                        break;
                    case "9":
                        return "September";
                        break;
                    case "10":
                        return "October";
                        break;
                    case "11":
                        return "November";
                        break;
                    case "12":
                        return "December";
                        break;
                }
            } else {
                return "";
            }
        },
        joinedInYear() {
            if (this.user) {
                return this.user.joined.split("-").slice(0, 2)[0];
            } else {
                return "";
            }
        },
    },
    methods: {
        ...mapActions("profile", {
            getTweets: "getTweets",
            getUser: "getUser",
        }),

        async loadTweets() {
            console.log("get profile tweets and info");
            this.getTweets(this.urlWithPage).then((res) => {
                this.getUser(window.User.id);
            });
        },
        handleToScrolledProfile(isVisible) {
            if (!isVisible) {
                return;
            }
            if (this.lastPage === this.page) {
                return;
            }

            console.log("at bottom");
            this.page++;
            this.loadTweets;
        },
    },
    mounted() {
        this.loadTweets();
    },
};
</script>
