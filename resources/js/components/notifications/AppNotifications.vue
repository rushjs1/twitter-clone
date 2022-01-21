<template>
    <div>Notifications</div>
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
            tweets: "notifications",
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
    },
    mounted() {
        this.loadNotifications();
    },
};
</script>
