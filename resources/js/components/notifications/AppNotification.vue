<template>
    <div class="text-gray-300 h-32">
        {{ notification.id }}
    </div>
</template>

<script>
export default {
    name: "AppNotification",
    props: {
        notification: {
            required: true,
            type: Object,
        },
    },
};
</script>
