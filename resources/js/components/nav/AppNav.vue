<template>
    <div class="nav border-l-2 border-gray-800 text-lg text-gray-500">
        <div class="mt-4 mb-4 cursor-pointer" @click="goHome">
            <icon-twitter />
        </div>
        <div class="mb-4 flex flex-row cursor-pointer" @click="goHome">
            <icon-home /> Home
        </div>
        <div class="mb-4 flex flex-row cursor-pointer" @click="goNotifications">
            <icon-bell /> Notifications
        </div>
        <div class="mb-4 flex flex-row cursor-pointer">
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
    },
};
</script>
