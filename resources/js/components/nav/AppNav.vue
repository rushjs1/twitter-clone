<template>
    <div class="nav text-lg text-gray-500">
        <div class="mt-4 mb-4 cursor-pointer" @click="goHome">
            <icon-twitter />
        </div>
        <div class="mb-4 flex flex-row cursor-pointer" @click="goHome">
            <icon-home /> Home
        </div>
        <div class="mb-4 flex flex-row cursor-pointer" @click="goNotifications">
            <icon-bell /> Notifications
        </div>
        <div class="mb-4 flex flex-row cursor-pointer" @click="goProfile">
            <icon-user /> Profile
        </div>
    </div>
</template>
<script>
export default {
    name: "AppNav",
    methods: {
        goHome() {
            window.location.replace("http://twitter.test/home");
        },
        goNotifications() {
            window.location.replace("http://twitter.test/notifications");
        },
        goProfile() {
            window.location.replace(
                `http://twitter.test/profile/${window.User.username}`
            );
        },
    },
    mounted() {
        console.log(window);
    },
};
</script>
