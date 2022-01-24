<template>
    <div class="p-4">
        {{ notification.id }}
    </div>
</template>

<script>
export default {
    name: "AppNotificationTweetRepliedTo",
    props: {
        notification: {
            required: true,
            type: Object,
        },
    },
};
</script>
