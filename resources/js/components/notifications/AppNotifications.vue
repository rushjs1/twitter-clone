<template>
    <div>
        <app-notification
            v-for="notification in notifications"
            :key="notification.id"
            :notification="notification"
        />
        <div
            v-if="notifications.length"
            v-observe-visibility="{ callback: handleToScrolledNotifications }"
        ></div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "AppNotifications",
    data() {
        return {
            page: 1,
            lastPage: 1,
        };
    },
    computed: {
        ...mapGetters("notifications", {
            notifications: "notifications",
        }),
        urlWithPage() {
            return `api/notifications?page=${this.page}`;
        },
    },
    methods: {
        ...mapActions("notifications", {
            getNotifications: "getNotifications",
        }),
        loadNotifications() {
            this.getNotifications(this.urlWithPage).then((res) => {
                this.lastPage = res.data.meta.last_page;
            });
        },
        handleToScrolledNotifications(isVisible) {
            if (!isVisible) {
                return;
            }
        },
    },
    mounted() {
        this.loadNotifications();
    },
};
</script>
