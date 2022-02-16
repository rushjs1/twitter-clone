<template>
    <div>
        <div
            class="w-full inline-block p-4 border-b border-gray-800 text-gray-300"
        >
            <div class="w-full h-10" @click="goTimeline">
                <icon-left />
            </div>
            <div
                class="w-full inline-block h-40 bg-gradient-to-r from-sky-500 to-indigo-500 text-gray-200"
            >
                <div class="text-center">Banner image here</div>

                <div>
                    <img
                        :src="user.avatar"
                        class="w-28 h-28 rounded-full mt-24 ml-2 border-4 border-gray-900"
                    />
                </div>
            </div>
            <div class="flex justify-between mt-4">
                <div></div>
                <div
                    class="rounded-xl border border-gray-100 p-2 text-xs h-8 flex items-center justify-center hover:bg-gray-800"
                >
                    Edit Profile
                </div>
            </div>
            <div class="text-gray-300 mt-8 text-2xl">
                {{ user.name }}
            </div>
            <div class="text-gray-400 mt-1 text-md">@{{ user.username }}</div>

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
            <div class="text-gray-400 mt-4 flex">
                <div class="flex">
                    <div class="mr-1 text-lg">
                        {{ user.following.length }}
                    </div>
                    <div class="text-gray-300 text-lg">Following</div>
                </div>
                <div class="flex">
                    <div class="ml-6 mr-1 text-lg">
                        {{ user.followers.length }}
                    </div>
                    <div class="text-gray-300 text-lg">Followers</div>
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
            this.getTweets(this.urlWithPage).then(() => {
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
        goTimeline() {
            window.location.replace("http://twitter.test/home");
        },
    },
    mounted() {
        this.loadTweets();
    },
};
</script>
